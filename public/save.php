<?php
include("../database/db.php");

/* ===== 1. መሰረታዊ መረጃዎችን መቀበልና ማፅዳት ===== */
$full_name = mysqli_real_escape_string($conn, $_POST['full_name'] ?? '');
$gender    = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
$age       = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$phone     = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$education_level = mysqli_real_escape_string($conn, $_POST['education'] ?? '');
$kebele          = mysqli_real_escape_string($conn, $_POST['kebele'] ?? '');

// መንደር እና የስራ ፍላጎት (ሌላ ተመርጦ ከሆነ)
$village = ($_POST['village_select'] == 'ሌላ') ? mysqli_real_escape_string($conn, $_POST['village_other']) : mysqli_real_escape_string($conn, $_POST['village_select']);
$job_interest = ($_POST['job_select'] == 'ሌላ') ? mysqli_real_escape_string($conn, $_POST['job_other']) : mysqli_real_escape_string($conn, $_POST['job_select']);

$situation = mysqli_real_escape_string($conn, $_POST['special'] ?? 'መደበኛ');
$structure = mysqli_real_escape_string($conn, $_POST['structure'] ?? 'በግል');

/* ===== 2. የፋይል ጭነት (File Upload Logic) ===== */
$new_file_name = NULL; // ፋይል ካልተመረጠ ባዶ እንዲሆን

if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
    $upload_dir = "uploads/upload.php";
    
    // ፎልደሩ ከሌለ እንዲፈጠር ማድረግ
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_name = $_FILES['document']['name'];
    $file_tmp = $_FILES['document']['tmp_name'];
    
    // የፋይሉን ስም ልዩ ማድረግ
    $new_file_name = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $file_name);
    $target_file = $upload_dir . $new_file_name;

    if (!move_uploaded_file($file_tmp, $target_file)) {
        die("❌ ፋይሉን ወደ ፎልደሩ መጫን አልተቻለም።");
    }
}

/* ===== 3. ሁሉንም ዳታ በአንድ ላይ ወደ ዳታቤዝ ማስገባት ===== */
$sql = "INSERT INTO job_seekers 
(full_name, gender, age, phone, education_level, region, zone, town, kebele, village_select, job_interest, situation, structure, document_path) 
VALUES 
('$full_name', '$gender', '$age', '$phone', '$education_level', 'ማእከላዊ ኢትዮጵያ', 'ምስራቅ ጉራጌ', 'ቡታጅራ', '$kebele', '$village', '$job_interest', '$situation', '$structure', '$new_file_name')";

if (mysqli_query($conn, $sql)) {
    header("Location: register.php?status=success");
    exit();
} else {
    echo "❌ የዳታቤዝ ስህተት: " . mysqli_error($conn);
}
?>