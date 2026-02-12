<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    http_response_code(403);
    exit("Access denied");
}

include("../database/db.php");

$result = mysqli_query($conn, "
    SELECT education_level, COUNT(*) AS total
    FROM job_seekers
    GROUP BY education_level
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports - Education Level</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Global Admin CSS -->
    <link rel="stylesheet" href="assets/admin.css">
</head>

<body>

<div class="admin-container">

    <h2 class="report-title">Reports by Education Level</h2>

    <div class="report-card">
        <table class="report-table">
            <thead>
                <tr>
                    <th>Education Level</th>
                    <th>Total Job Seekers</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($r = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($r['education_level']) ?></td>
                    <td><?= $r['total'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="report-actions">
        <a href="dashboard.php" class="btn btn-primary">⬅ Back to Dashboard</a>
        <a href="exportReport_excel.php" class="btn btn-success"> Export Excel</a>
    </div>

</div>

</body>
</html>

<?php mysqli_close($conn); ?>
