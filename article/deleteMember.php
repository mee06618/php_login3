<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원탈퇴</title>
</head>
<style>
    body{
        display: table; margin-left: auto; margin-right: auto;
    }

</style>
<body>
    <h1>정말로 탈퇴하시겠습니까?</h1>
    <form action = "doDeleteMember.php">
    <input type="hidden" name="memberid" value=<?=$_GET['memberid']?>>
    <input type="password" name ="pass" >
    <input type="submit" value="탈퇴">
    </form>
</body>
</html>