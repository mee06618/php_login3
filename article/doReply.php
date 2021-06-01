<?php
session_start();
require_once('../dao.php');

$writer = $_GET['writer'];
$body = $_GET['body'];
writeReply($writer,$body)


?>
<script>
<?php if ($isok==1) { ?>
        alert("생성됨")
        history.back()
    <?php }else if($isok==0) { ?>
        alert("실패")
        history.back()
    <?php } ?>


</script>