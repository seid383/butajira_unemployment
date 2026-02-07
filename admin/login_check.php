<?php
session_start();
include("../database/db.php");

/* ===== GET INPUT ===== */
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if($username=='' || $password==''){
    exit("❌ Empty login");
}

/* ===== PREPARE QUERY ===== */
$stmt = $conn->prepare("
SELECT id,username,password,role
FROM users
WHERE username=? AND status=1
");

if(!$stmt){
    die("SQL Prepare Error");
}

$stmt->bind_param("s",$username);
$stmt->execute();

$res = $stmt->get_result();

/* ===== CHECK USER ===== */
if($user = $res->fetch_assoc()){

    if(password_verify($password,$user['password'])){

        session_regenerate_id(true);

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['username']  = $user['username'];   // ✅ important
        $_SESSION['role']      = $user['role'];
        $_SESSION['LAST_LOGIN']= time();

        if($user['role']=="admin"){
            header("Location: dashboard.php");
        }else{
            header("Location: ../staff/staff_dashboard.php");
        }
        exit();
    }
}

/* ===== FAIL ===== */
echo "❌ Invalid login";
?>
