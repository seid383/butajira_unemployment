<?php
session_start();
include("auth_staff.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Staff Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="topbar">
<h3>👨‍💼 Staff Panel</h3>
<a href="logout.php">Logout</a>
</div>

<div class="container">

<h4>
Welcome <?= htmlspecialchars($_SESSION['username'] ?? 'User'); ?>
</h4>

<a href="view_users.php">👥 View Registrations</a>

</div>

</body>
</html>
