<?php
    require_once('../dao.php');
    $title =$_GET['title'];
    $body =$_GET['body'];
    $id =$_GET['id'];
    $temp = getInfoMember($id);
    $isok=writeArticle($title,$body,$temp['memberid']);
   

?>

<script>

    <?php if ($isok) { ?>
        alert("생성됨")
        location.href='list.php'
    <?php }else { ?>
        alert("생성 실패")
        history.back()
    <?php }?>
    
</script>