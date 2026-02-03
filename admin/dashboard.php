<?php
include("auth.php");
include(__DIR__ . "/../database/db.php");

$total = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS t FROM job_seekers")
)['t'];

$male = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS t FROM job_seekers WHERE gender='Male'")
)['t'];

$female = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS t FROM job_seekers WHERE gender='Female'")
)['t'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .card-icon {
            font-size: 40px;
            opacity: 0.7;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">
            <i class="bi bi-building"></i>
            Butajira Unemployment System
        </span>

        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container mt-4">

    <!-- WELCOME -->
    <div class="alert alert-success shadow-sm">
        <h5 class="mb-0">
            👋 Welcome, Admin
        </h5>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Registered</h6>
                        <h2 class="fw-bold"><?= $total ?></h2>
                    </div>
                    <div class="card-icon text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Male</h6>
                        <h2 class="fw-bold"><?= $male ?></h2>
                    </div>
                    <div class="card-icon text-info">
                        <i class="bi bi-gender-male"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Female</h6>
                        <h2 class="fw-bold"><?= $female ?></h2>
                    </div>
                    <div class="card-icon text-danger">
                        <i class="bi bi-gender-female"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ACTION BUTTONS -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">

            <a href="view_users.php" class="btn btn-primary btn-lg m-2">
                <i class="bi bi-list-ul"></i>
                View Job Seekers
            </a>

            <a href="import_excel.php" class="btn btn-success btn-lg m-2">
                <i class="bi bi-file-earmark-excel"></i>
                Import Excel
            </a>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
