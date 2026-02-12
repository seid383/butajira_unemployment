<?php
include("../database/db.php");

/* ===== 1. BASIC VALIDATION ===== */
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
if ($age < 18 || $age > 64) {
    die("Error: እድሜዎ ከ18 በታች ወይም ከ64 በላይ ስለሆነ መመዝገብ አይችሉም።");
}

/* ===== 2. RECEIVE & CLEAN DATA ===== */
$full_name = mysqli_real_escape_string($conn, $_POST['full_name'] ?? '');
$gender    = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
$phone     = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');

// Validation for Phone
if(!preg_match('/^(09|07)[0-9]{8}$|^(?:\+251|251)(9|7)[0-9]{8}$/', $phone)){
    exit("❌ Invalid Ethiopian phone number");
} 

$education_level = mysqli_real_escape_string($conn, $_POST['education'] ?? '');
$kebele          = mysqli_real_escape_string($conn, $_POST['kebele'] ?? '');

// Logic for "Other" Village
$village = mysqli_real_escape_string($conn, $_POST['village_select'] ?? '');
if ($village == 'ሌላ') {
    $village = mysqli_real_escape_string($conn, $_POST['village_other'] ?? '');
}

// Logic for "Other" Job
$job_interest = mysqli_real_escape_string($conn, $_POST['job_select'] ?? '');
if ($job_interest == 'ሌላ') {
    $job_interest = mysqli_real_escape_string($conn, $_POST['job_other'] ?? '');
}

/* ===== 3. DEFAULT VALUES ===== */
// These match your original table columns but provide defaults if the form skips them
$region    = "ማእከላዊ ኢትዮጵያ";
$zone      = "ምስራቅ ጉራጌ";
$town      = "ቡታጅራ";
$situation = mysqli_real_escape_string($conn, $_POST['special'] ?? 'መደበኛ');
$structure = mysqli_real_escape_string($conn, $_POST['structure'] ?? 'በግል');

/* ===== 4. EMPTY FIELD CHECK ===== */
if (empty($full_name) || empty($phone) || empty($village) || empty($job_interest)) {
    echo "<h3 style='color:red;'>❌ ያልተሞላ ነገር አለ፣ እባኮ በድጋሚ ይሙሉ!</h3>";
    echo "<a href='register.php'>ወደ ኋላ ተመለስ</a>";
    exit();
}

/* ===== 5. INSERT DATA ===== */
$sql = "INSERT INTO job_seekers 
(full_name, gender, age, phone, education_level, region, zone, town, kebele, village_select, job_interest, situation, structure) 
VALUES 
('$full_name', '$gender', '$age', '$phone', '$education_level', '$region', '$zone', '$town', '$kebele', '$village', '$job_interest', '$situation', '$structure')";

if (mysqli_query($conn, $sql)) {
    // REDIRECT back to register.php with success status to trigger the MODAL
    header("Location: register.php?status=success");
    exit();
} else {
    echo "Database Error: " . mysqli_error($conn);
}
?>