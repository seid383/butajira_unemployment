<?php
include("../database/db.php");

/* ===== RECEIVE ===== */
$full_name = $_POST['full_name'] ?? '';
$gender    = $_POST['gender'] ?? '';
$age       = $_POST['age'] ?? '';
$phone=$_POST['phone'] ?? '';

if(!preg_match('/^(09|07)[0-9]{8}$|^(?:\+251|251)(9|7)[0-9]{8}$/',$phone)){
exit("❌ Invalid Ethiopian phone number");
}

$education_level = $_POST['education_level'] ?? '';

$region = $_POST['region'] ?? '';
$zone   = $_POST['zone'] ?? '';
$town   = $_POST['town'] ?? '';

$kebele = $_POST['kebele'] ?? '';
$village = $_POST['village_select'] ?? '';

$job_interest = $_POST['job_select'] ?? '';
$situation    = $_POST['special'] ?? '';
$structure    = $_POST['structure'] ?? '';

/* ===== VALIDATION ===== */
if(
!$full_name || !$phone || !$age ||
!$gender || !$education_level ||
!$kebele || !$village ||
!$job_interest || !$situation
){
exit("❌ መረጃ አልተሟላም");
}

/* ===== DUPLICATE CHECK ===== */
$check=$conn->prepare("
SELECT 1 FROM job_seekers
WHERE full_name=? AND phone=?
LIMIT 1
");
$check->bind_param("ss",$full_name,$phone);
$check->execute();
$check->store_result();

if($check->num_rows>0){
exit("⚠️ ይህ ሰው አስቀድሞ ተመዝግቧል");
}

/* ===== INSERT ===== */
$stmt=$conn->prepare("
INSERT INTO job_seekers
(full_name, gender, age, phone, education_level,
region, zone, town, kebele, village_select,
job_interest, situation, structure)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
");

$stmt->bind_param(
"sssssssssssss",
$full_name,$gender,$age,$phone,$education_level,
$region,$zone,$town,$kebele,$village,
$job_interest,$situation,$structure
);

if($stmt->execute()){
echo "✅ Registration successful";
}else{
echo "❌ Database Error";
}
?>
