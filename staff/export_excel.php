<?php
include("auth_staff.php");
include("../database/db.php");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=job_seekers_staff.xls");

$res = mysqli_query($conn,"SELECT * FROM job_seekers");
echo "ID\tName\tGender\tPhone\n";

while($r=mysqli_fetch_assoc($res)){
    echo "{$r['id']}\t{$r['full_name']}\t{$r['gender']}\t{$r['phone']}\n";
}
?>  
