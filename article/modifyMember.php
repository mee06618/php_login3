<?php
 require_once('../dao.php');
    
    $info = getInfoMember($_GET['id']);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = “post” action="doModifyMember.php">
    <input type="hidden" name ="memberid" value=<?=$info['memberid']?>>
        이름 입력 : <input type="text" name="name" value=<?=$info['name']?>><br>
        아이디 입력 : <input type="text" name="id" value =<?=$info['id']?>></input><br>
        <input type="submit" value="수정">
    </form>
</body>
</html>