<?php
   session_start();
    require_once('../dao.php');
    $id=$_GET['id'];
    $pass=$_GET['pass'];
    $encrypted_password = base64_encode(hash('sha256',  $pass, true));
    $isok=loginMember($id,$encrypted_password);
    $_SESSION["USER"] = getNumMember($id,$encrypted_password);
    $num = getNumMember($id,   $encrypted_password);
?>

<script>

    <?php if ($isok==1) { ?>
        alert("로그인!")
        location.href='list.php?id=<?=$num?>'
    <?php }else if($isok==0) { ?>
        alert("아이디없음")
        history.back()
    <?php }else if($isok==-1) { ?>
        alert("비밀번호틀림")
        history.back()
    <?php }else if($isok==-2) { ?>
        alert("오류")
        history.back()
    <?php }?>
    
</script>