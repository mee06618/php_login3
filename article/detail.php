<?php
    session_start();
    require_once('../dao.php');
    $id = $_GET['id'];
    $info = getInfoArticle($id);
    hitArticle($id,$info['title']   );
    if ( !isset($_SESSION['USER'])){
    $user=getInfoMember($_SESSION['USER']);
    }
    
    
        $replies=listReply();
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 내용</title>

    <form action="modify.php">
    <div>
   
        <h2>작성자 : <?=$info['writer']?></h2>
        <h2>작성일자 : <?=$info['regdate']?></h2>
        <h2>조회수 : <?=$info['hit']?></h2>
        <h2>제목 : <?=$info['title']?></h2>
        <h2>내용 : <?=$info['body']?></h2>
    </div>
    <input type="hidden" name="id" value=<?=$info['id']?>>
    <?php if($_SESSION['USER']==$info['writer']){?>
        <input type=submit value="수정">
    </form>
    <form action=delete.php?>
   
          <input type=submit value="삭제">
     <?php }?>
    </form>
    <?php if (isset($_SESSION['USER'])){?>
    <form action="doReply.php">
    <input type="hidden" name="writer" value=<?=$info['writer']?>>
        입력 :  <input type="text" name="body">
        <input type=submit value="입력">
    </form>
    <?php } ?><br>
    <?php if($replies) { foreach($replies as $reply){?>
            <div>
        <form action ="doModifyReply.php">
        작성자 : <?=$reply['writer']?><br>
        내용 : <?=$reply['body']?><br>
        <input type=submit value="수정">
        <button><type="button" href="#" onclick="window.open('deleteReply.php?id=<?=$info['id']?>','win2','scrollbars=yes width=400, height=300');return false">삭제</type=></button>
        <hr>
        </form>
        </div>
        
        <?php } }else{?>
        댓글이 없습니다
        <?php } ?>
    </head>
<body>
    
</body>
</html>