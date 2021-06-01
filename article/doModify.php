<?php
    require_once('../dao.php');
    $title =$_GET['title'];
    $body =$_GET['body'];
    $id =$_GET['id'];
    $isok=modifyArticle($id,$title,$body);
   

?>

<script>

    <?php if ($isok) { ?>
        alert("수정됨")
        location.href='list.php'
    <?php }else { ?>
        alert("수정 실패")
        history.back()
    <?php }?>
    
</script>