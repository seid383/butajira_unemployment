<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    exit("Access denied");
}
include("database/db.php");

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=job_seekers.csv");

$out = fopen("php://output","w");
fputcsv($out, ['ID','Name','Gender','Phone']);

$res = mysqli_query($conn,"SELECT * FROM job_seekers");
while($r=mysqli_fetch_assoc($res)){
    fputcsv($out, [$r['id'],$r['full_name'],$r['gender'],$r['phone']]);
}
fclose($out);
?>
