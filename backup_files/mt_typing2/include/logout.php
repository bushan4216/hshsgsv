<?php
include('../config.php');
session_destroy();
echo "<script>window.location = '".SYSTEM_MAIN."'</script>";
?>