<?php
include("../database/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    
    // የፋይል መረጃዎችን መቀበል
    $file_name = $_FILES['document']['name'];
    $file_tmp = $_FILES['document']['tmp_name'];
    $upload_dir = "uploads/";

    // የፋይሉን ስም ለየት ያለ ማድረግ (ግጭት እንዳይፈጠር)
    $new_file_name = time() . "_" . $file_name;
    $target_file = $upload_dir . $new_file_name;

    // ፎልደሩ ከሌለ እንዲፈጠር ማድረግ
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // ፋይሉን ወደ ፎልደሩ ማንቀሳቀስ
    if (move_uploaded_file($file_tmp, $target_file)) {
        // የፋይሉን መንገድ (Path) በዳታቤዝ ውስጥ ማስቀመጥ
        $sql = "INSERT INTO job_seekers (full_name, document_path) VALUES ('$full_name', '$new_file_name')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: register.php?status=success");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ፋይሉን መጫን አልተቻለም።";
    }
}
?>