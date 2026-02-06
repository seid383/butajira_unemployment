<?php
include("auth_staff.php");
include("../database/db.php");

$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM job_seekers"))['t'];
?>
<h3>👷 Staff Dashboard</h3>
<p>Total Records: <?= $total ?></p>

<a href="staff_view.php">View Records</a> |
<a href="reports.php">Reports</a> |
<a href="export_excel.php">Export Excel</a>
<a href="logout.php">Logout</a>
?>  

<?php
mysqli_close($conn);
?>      