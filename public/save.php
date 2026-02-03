<?php
include("../database/db.php");

$full_name = mysqli_real_escape_string($conn, $_POST['full_name'] ?? '');
$phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$age_range = mysqli_real_escape_string($conn, $_POST['age_range'] ?? '');
$gender = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
$education_level = mysqli_real_escape_string($conn, $_POST['education_level'] ?? '');
$village = mysqli_real_escape_string($conn, $_POST['village'] ?? '');
$job_interest = mysqli_real_escape_string($conn, $_POST['job_interest'] ?? '');

/* ✅ BASIC VALIDATION */
if (
    $full_name == '' || $phone == '' || $age_range == '' ||
    $gender == '' || $education_level == '' || $village == '' || $job_interest == ''
) {
    echo "<h3 style='color:red;'>❌ All fields are required.</h3>";
    echo "<a href='register.php'>Go Back</a>";
    exit();
}

/* ✅ SMART DUPLICATE CHECK (NAME + PHONE) */
$check = mysqli_query(
    $conn,
    "SELECT id FROM job_seekers 
     WHERE full_name='$full_name' AND phone='$phone'
     LIMIT 1"
);

if (mysqli_num_rows($check) > 0) {
    echo "<h3 style='color:red;'>❌ This person is already registered.</h3>";
    echo "<a href='register.php'>Go Back</a>";
    exit();
}

/* ✅ INSERT DATA */
$sql = "INSERT INTO job_seekers
(full_name, phone, age_range, gender, education_level, village, job_interest)
VALUES
('$full_name','$phone','$age_range','$gender','$education_level','$village','$job_interest')";

if (mysqli_query($conn, $sql)) {
    echo "<h3 style='color:green;'>✅ Registration successful. Thank you.</h3>";
} else {
    echo "Database Error: " . mysqli_error($conn);
}
?>
