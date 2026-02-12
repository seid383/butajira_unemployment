<?php
session_start();
if(!in_array($_SESSION['role'], ['admin','staff'])){
    header("Location: ../login.php");
    exit();
}
include("../database/db.php");

/* ===== COUNTS ===== */
$total = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers")
)['t'];

$male = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers WHERE gender='ወንድ'")
)['t'];

$female = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers WHERE gender='ሴት'")
)['t'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics</title>
    <style>
        /* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f6;
    margin: 0;
    padding: 20px;
    color: #333;
}

h2 {
    color: #2c3e50;
    margin-bottom: 20px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

/* Container for the Cards */
.analytics-grid {
    display: flex;
    gap: 20px;
    list-style: none;
    padding: 0;
    flex-wrap: wrap;
}

/* Individual Card Styling */
.card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    min-width: 200px;
    flex: 1;
    transition: transform 0.2s ease;
}

.card:hover {
    transform: translateY(-50px);
}

/* Icon and Text Layout */
.icon {
    font-size: 2.5rem;
    margin-right: 15px;
}

.info {
    display: flex;
    flex-direction: column;
}

.label {
    font-size: 0.9rem;
    color: #7f8c8d;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.value {
    font-size: 1.5rem;
    font-weight: bold;
    color: #2c3e50;
}

/* Color Accents (Optional) */
.total { border-left: 5px solid #3498db; }
.male { border-left: 5px solid #2980b9; }
.female { border-left: 5px solid #e91e63; }
    </style>
</head>
<body>
    <div class="container">
        <h2>System Analytics</h2>
        <ul class="analytics-grid">
            <li class="card total">
                <span class="icon"></span>
                <div class="info">
                    <span class="label">Total Registered</span>
                    <span class="value"><?= $total ?></span>
                </div>
            </li>
            <li class="card male">
                <span class="icon"></span>
                <div class="info">
                    <span class="label">Male</span>
                    <span class="value"><?= $male ?></span>
                </div>
            </li>
            <li class="card female">
                <span class="icon"></span>
                <div class="info">
                    <span class="label">Female</span>
                    <span class="value"><?= $female ?></span>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>