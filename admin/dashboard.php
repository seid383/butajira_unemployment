<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    header("Location: login.php");
    exit();
}

include("../database/db.php");

/* General Statistics */
$total  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) t FROM job_seekers"))['t'];
$male   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) t FROM job_seekers WHERE gender='ወንድ'"))['t'];
$female = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) t FROM job_seekers WHERE gender='ሴት'"))['t'];

/* Kebele Statistics */
$kebeles = ['ዘቢዳር', 'እሪንዛፍ', 'እሬሻ'];
$kebele_counts = [];

foreach ($kebeles as $k) {
    $res = mysqli_query($conn, "SELECT COUNT(*) t FROM job_seekers WHERE kebele='$k'");
    $kebele_counts[$k] = mysqli_fetch_assoc($res)['t'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/admin.css">
    <style>
        /* Custom styles for Kebele cards */
        .card-kebele { border-top: 4px solid #3498db; }
        .kebele-title { color: #1A374D; font-size: 0.9rem; margin-bottom: 5px; }
    </style>
</head>

<body class="view-users">

<div class="admin-container">

    <h2 class="dashboard-title">Dashboard</h2>

    <div class="dashboard-grid">
        <div class="dashboard-card card-users">
            <h4>Total Job Seekers</h4>
            <div class="count"><?= $total ?></div>
        </div>

        <div class="dashboard-card card-male">
            <h4>Male</h4>
            <div class="count"><?= $male ?></div>
        </div>

        <div class="dashboard-card card-female">
            <h4>Female</h4>
            <div class="count"><?= $female ?></div>
        </div>
    </div>

    <h3 style="margin-top: 30px; color: #1A374D;">የቀበሌዎች ዝርዝር (Kebeles)</h3>
    <div class="dashboard-grid" style="grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));">
        <?php foreach ($kebele_counts as $name => $count): ?>
            <div class="dashboard-card card-kebele">
                <div class="kebele-title"><?= $name ?></div>
                <div class="count" style="font-size: 1.5rem;"><?= $count ?></div>
                <small style="color: #888;">ተመዝጋቢዎች</small>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="dashboard-links" style="margin-top: 40px;">
        <a class="btn btn-primary" href="reports.php">Reports</a>
        <a href="view_users.php" class="btn btn-success">View Job Seekers</a>
        <a class="btn btn-success" href="export_excel.php">Export Excel</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
        <a href="../public/index.php" class="btn btn-secondary">Back to Public Website</a>
    </div>

</div>

</body>
</html>