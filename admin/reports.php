<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    exit("Access denied");
}
include("../database/db.php");

$result = mysqli_query($conn,"
    SELECT education_level, COUNT(*) total
    FROM job_seekers
    GROUP BY education_level
");
?>
<h3>📊 Reports by Education</h3>
<ul>
<?php while($r=mysqli_fetch_assoc($result)){ ?>
<li><?= $r['education_level'] ?> : <?= $r['total'] ?></li>
<?php } ?>
</ul>
<?php
mysqli_close($conn);
?>
