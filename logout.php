<?php
session_start();
session_destroy();
$_SESSION = [];
session_unset();


echo "<script> alert('Anda Telah Logout'); </script>";
echo "<script>location='index.php'; </script>";

exit;
?>