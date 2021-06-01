<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 작성</title>
</head>
<body>
    <form method = “post” action="doWrite.php">
    <input type="hidden" name = 'id' value=<?=$_GET['id']?>>
        제목 입력 : <input type="text" name="title"><br>
        내용 입력 : <textarea name="body"></textarea>
        <input type="submit" value="작성">
    </form>
</body>
</html>