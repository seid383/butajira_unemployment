<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    exit("Access denied");
}
include("../database/db.php");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=job_seekers.xls");

$result = mysqli_query($conn,"SELECT * FROM job_seekers");

echo "ID\tName\tGender\tage\tEducation\tRegion\tZone\tTown\tKebele\tVillage\tJob_interest\tSituation\tStructure\tBiometrics\tregisterd_at\tcreated_at\n";
while($r=mysqli_fetch_assoc($result)){
    echo "{$r['id']}\t{$r['full_name']}\t{$r['gender']}\t{$r['age']}\t{$r['phone']}{$r['education_level']}\t{$r['region']}\t{$r['zone']}\t{$r['town']}\t{$r['kebele']}{$r['village_select']}\t{$r['job_interest']}\t{$r['situation']}\t{$r['structure']}\t{$r['biometrics']}{$r['register_at']}\t{$r['created_at']}\n";
}
mysqli_close($conn);
?> 
    