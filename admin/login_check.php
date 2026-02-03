<?php
session_start();
include(__DIR__ . "/../database/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admins 
            WHERE username='$username' 
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<h3>❌ Invalid username or password</h3>";
        echo "<a href='login.php'>Back to Login</a>";
    }
}
?>
