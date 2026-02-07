<?php
session_start();

/* ===== LOGIN CHECK ===== */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['role'])){
header("Location: login.php");
exit();
}

/* ===== SESSION TIMEOUT (30min) ===== */
if(isset($_SESSION['LAST_LOGIN']) &&
(time()-$_SESSION['LAST_LOGIN']>1800)){
session_unset();
session_destroy();
header("Location: login.php?timeout=1");
exit();
}

/* ===== SESSION REGENERATION ===== */
session_regenerate_id(true);
$_SESSION['LAST_LOGIN']=time();
?>
