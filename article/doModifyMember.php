<?php
    require_once('../dao.php');
    $id =$_GET['id'];
    $memberid=$_GET['memberid'];
  
    $name=$_GET['name'];
    $isok=modifyMember($id,$name,$memberid);
   

?>

<script>

    <?php if ($isok==1) { ?>
        alert("수정됨")
        location.href='list.php'
    <?php }else if($isok==0) { ?>
        alert("아이디중복")
        history.back()
    <?php }else if($isok==-1) { ?>
        alert("이름중복")
        history.back()
    <?php }else if($isok==-2) { ?>
        alert("오류")
        history.back()
    <?php }?>
    
</script>
</html>