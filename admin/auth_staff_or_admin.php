<?php
include("auth_core.php");

if(!in_array($_SESSION['role'],['admin','staff'])){
http_response_code(403);
exit("⛔ Access denied");
}
?>
