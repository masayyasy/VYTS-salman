<?php
session_start();
session_destroy();
?>

<script type="text/javascript">
    alert('çıkış yaptınız.');
    location.href = "login.php";
</script>