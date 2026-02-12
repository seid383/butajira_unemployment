<?php
include("auth.php");
include("../database/db.php");

// Security check: only admin can delete
if ($_SESSION['role'] !== 'admin') {
    exit("Access Denied");
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM job_seekers WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: view_users.php?msg=deleted");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>