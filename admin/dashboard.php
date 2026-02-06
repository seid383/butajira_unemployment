<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    header("Location: login.php");
    exit();
}
include("../database/db.php");

$total  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers"))['t'];
$male   = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers WHERE gender='ወንድ'"))['t'];
$female = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers WHERE gender='ሴት'"))['t'];
?>
<h2>📊 Dashboard</h2>
<p>Total: <?= $total ?></p>
<p>Male: <?= $male ?></p>
<p>Female: <?= $female ?></p>

<a href="reports.php">📈 Reports</a> |
<a href="export_excel.php">📥 Export Excel</a> |
<a href="logout.php">Logout</a>
