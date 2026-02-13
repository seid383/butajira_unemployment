<?php
session_start();
include("../database/db.php");

$total = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) t FROM job_seekers")
)['t'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Admin / Staff Shared CSS -->
    <link rel="stylesheet" href="../admin/assets/admin.css">
</head>

<body class="view-users">


<div class="dashboard">

    <div class="topbar">
        <h2>Staff Dashboard</h2>
        
    </div>

    <div class="cards">

        <div class="card">
            <h3>Total Records</h3>
            <p><?= $total ?></p>
        </div>
        

    </div>

    <div class="actions">
        <a href="staff_view.php" class="btn btn-primary">View Records</a>
        <a href="reports.php" class="btn btn-secondary"> Reports</a>
        <a href="export_excel.php" class="btn btn-success">Export Excel</a>
        <a href="../Login_and_Signup/logout-user.php" class="btn btn-danger">Logout</a>
    </div>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
