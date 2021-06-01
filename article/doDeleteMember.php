<?php
session_start();
 require_once('../dao.php');
 $pass=$_GET['pass'];

 $encrypted_password = base64_encode(hash('sha256',  $pass, true));
$isok = deleteMember($memberid,$encrypted_password);
    
?>

<script>

    <?php if ($isok==1) { ?>
        alert("삭제되었습니다")
        session_destroy();
        opener.location.reload();
        self.close()
    <?php }else if($isok==0) { ?>
        alert("비밀번호가 틀립니다")
        history.back()
    <?php }?>
    
</script>