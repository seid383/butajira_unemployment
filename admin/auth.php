<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    http_response_code(403);
    exit("⛔ Access denied (Admin only)");
}
?>