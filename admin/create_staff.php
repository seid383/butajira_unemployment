<?php
include("../database/db.php");

$username="staff1";
$password=password_hash("staff123",PASSWORD_DEFAULT);
$role="staff";

$stmt=$conn->prepare("
INSERT INTO users(username,password,role,status)
VALUES (?,?,?,1)
");

$stmt->bind_param("sss",$username,$password,$role);
$stmt->execute();

echo "staff created";
?>