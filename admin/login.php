<?php
session_start();
include("../database/db.php");

$error="";

if(isset($_POST['login'])){

$username=trim($_POST['username']);
$password=trim($_POST['password']);

$stmt=$conn->prepare("SELECT * FROM users WHERE username=? AND status=1 LIMIT 1");
$stmt->bind_param("s",$username);
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows===1){

$user=$result->fetch_assoc();

if(password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['id'];
$_SESSION['username']=$user['username'];
$_SESSION['role']=$user['role'];

header("Location: dashboard.php");
exit();

}else{
$error="Wrong password";
}

}else{
$error="User not found";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin / Staff Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="auth-wrapper">
<div class="auth-box">

<h2 class="auth-heading">Admin / Staff Login</h2>

<?php if($error!=""){ ?>
<div class="auth-error"><?php echo $error; ?></div>
<?php } ?>

<form method="POST">

<div class="input-group">
<label>Username</label>
<input type="text" name="username" required>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button type="submit" name="login" class="btn-login">
Login
</button>

</form>

</div>
</div>

</body>
</html>
