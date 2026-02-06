<?php
include("../database/db.php");

/* ===== RECEIVE DATA ===== */
$full_name = mysqli_real_escape_string($conn, $_POST['full_name'] ?? '');
$gender    = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
$age       = mysqli_real_escape_string($conn, $_POST['age'] ?? '');
$phone     = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$education_level = mysqli_real_escape_string($conn, $_POST['education'] ?? '');

$region = mysqli_real_escape_string($conn, $_POST['region'] ?? '');
$zone   = mysqli_real_escape_string($conn, $_POST['zone'] ?? '');
$town   = mysqli_real_escape_string($conn, $_POST['town'] ?? '');

$kebele = mysqli_real_escape_string($conn, $_POST['kebele'] ?? '');
$village = mysqli_real_escape_string($conn, $_POST['village_select'] ?? '');

$job_interest = mysqli_real_escape_string($conn, $_POST['job_select'] ?? '');
$situation    = mysqli_real_escape_string($conn, $_POST['special'] ?? '');
$structure    = mysqli_real_escape_string($conn, $_POST['structure'] ?? '');

/* ===== VALIDATION ===== */
if (
    $full_name == '' ||
    $phone == '' ||
    $age == '' ||
    $gender == '' ||
    $education_level == '' ||
    $kebele == '' ||
    $village == '' ||
    $job_interest == '' ||
    $situation == ''
) {
    echo "<h3 style='color:red;'>❌ ያልተሞላ ነገር አለ፣ እባኮ በድጋሚ ይሙሉ!</h3>";
    echo "<a href='register.php'>ወደ ኋላ</a>";
    exit();
}

/* ===== INSERT ===== */
$sql = "INSERT INTO job_seekers
(full_name, gender, age, phone, education_level, region, zone, town, kebele, village_select, job_interest, situation, structure)
VALUES
('$full_name','$gender','$age','$phone','$education_level','$region','$zone','$town','$kebele','$village','$job_interest','$situation','$structure')";

if (mysqli_query($conn, $sql)) {
    echo "<h3 style='color:green;'>✅ Registration successful. Thank you.</h3>";
} else {
    echo "Database Error: " . mysqli_error($conn);
}
?>
