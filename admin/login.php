<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Admin Global CSS -->
    <link rel="stylesheet" href="assets/admin.css">
</head>

<body class="auth-page">


<div class="card">
    <h3>Admin / Staff Login</h3>

    <form method="POST" action="login_check.php">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
