<?php
include("auth.php");
include(__DIR__ . "/../database/db.php");

$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS t FROM job_seekers"))['t'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Butajira Unemployment System</span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5>Total Registered</h5>
                    <h2><?= $total ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="view_users.php" class="btn btn-outline-primary">View Job Seekers</a>
        <a href="import_excel.php" class="btn btn-outline-success">Import Excel</a>
    </div>

</div>

</body>
</html>
