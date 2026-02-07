<?php
include("../admin/auth_core.php");

if($_SESSION['role']!=='staff'){
header("Location: ../admin/login.php");
exit();
}
?>
