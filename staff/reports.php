<?php
session_start();
if(!in_array($_SESSION['role'], ['admin','staff'])){
    header("Location: ../login.php");
    exit();
}
include("auth_staff.php");
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
<h2>📊 System Analytics</h2>

<ul>
<li>👥 Total Registered: <?= $total ?></li>
<li>👨 Male: <?= $male ?></li>
<li>👩 Female: <?= $female ?></li>
</ul>

