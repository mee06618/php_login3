<?php
 require_once('../dao.php');
 $id = $_GET['id'];
    $info = getInfoArticle($id);
    
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
    <form method = “post” action="doModify.php">
    <input type="hidden" name="id" value=<?=$id?>>
        제목 입력 : <input type="text" name="title" value=<?=$info['title']?>><br>
        내용 입력 : <textarea name="body" ><?=$info['body']?></textarea>
        <input type="submit" value="수정">
    </form>
</body>
</html>