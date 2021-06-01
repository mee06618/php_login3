<?php
    //require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';
    session_start();
    $myConn = @mysqli_connect("localhost","sbsst","sbs123414","emp") or die("error");
    $sql = "select * from article";
    $rs = mysqli_query($myConn,$sql);
    $article=[];
    $login = isset($_SESSION['USER']);
    while($article=mysqli_fetch_assoc($rs)){
        $articles[]=$article;
    }
    $sql = "select * from member where id =";
    $rs = mysqli_query($myConn,$sql);
    $id=  $_SESSION[ 'USER' ];
   

    ?>
<script>
function login(){
    if(!login){
     write.action = "write.php?id=<?=$id?>";
     write.submit();
    }
    else{
        alert("로그인 해주세요");
    }
    }  
     </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트</title>
</head>
<body>
   
        <?php foreach($articles as $article){?>
            <div>
        번호 : <a href="detail.php?id=<?=$article['id']?>"><?=$article['id']?></a><br>
        날짜 : <?=$article['regdate']?><br>
        조회수 : <?=$article['hit']?><br>
        제목 : <?=$article['title']?><br>
        내용 : <?=$article['body']?><br>
        <hr>
        </div>
        
        <?php } ?>
        
        
        <form method="post" name = write >
        
        <button type="button" onClick="login()">글 작성</button>
        </form>
       
        <form method = “post” action="join.php">
            <button type="submit">회원가입</button>
        </form>
        <?php if(!isset($_SESSION['USER'])){?>
        <form method = “post” action="login.php">
            <button type="submit">로그인</button>
        </form>
        <?php } else{ ?>
            <form method = “post” action="doLogout.php">
            <button type="submit">로그아웃</button>
        </form>
        <form method = “post” action="modifyMember.php">
            <input type="hidden" name = 'id' value=<?=$id?>>
            <button type="submit">정보수정</button>
        </form>
            
        <button><type="button" href="#" onclick="window.open('deleteMember.php?memberid=<?=$id?>','win2','scrollbars=yes width=400, height=300');return false">회원탈퇴</type=></button>

        <?php }?>
</body>
</html>