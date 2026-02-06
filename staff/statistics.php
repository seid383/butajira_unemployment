<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    exit("Access denied");
}
include("database/db.php");

$res = mysqli_query($conn,"SELECT town, COUNT(*) total FROM job_seekers GROUP BY town");
while($r=mysqli_fetch_assoc($res)){
    echo $r['town']." : ".$r['total']."<br>";
}
?>
