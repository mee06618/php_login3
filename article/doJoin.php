<?php
    require_once('../dao.php');
    $id =$_GET['id'];
    $pass =$_GET['pass'];
    $encrypted_password = base64_encode(hash('sha256',  $pass, true));

  
    $name=$_GET['name'];
    $isok=makeMember($id,$encrypted_password,$name);
   

?>

<script>

    <?php if ($isok==1) { ?>
        alert("생성됨")
        location.href='list.php'
    <?php }else if($isok==0) { ?>
        alert("아이디중복")
        history.back()
    <?php }else if($isok==-1) { ?>
        alert("비밀번호중복")
        history.back()
    <?php }else if($isok==-2) { ?>
        alert("오류")
        history.back()
    <?php }?>
    
</script>