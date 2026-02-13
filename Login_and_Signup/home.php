<?php 
require_once "controllerUserData.php"; 
include "../header/header.php";

?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $role = $fetch_info['role']; // የተጠቃሚውን ሚና እዚህ እናገኛለን

        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
                exit();
            }
        }else{
            header('Location: user-otp.php');
            exit();
        }
    }
}else{
    header('Location: login-user.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="../public/style.css">
    <style>
        /* General Styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif; /* Link በ HTML ካለ ይሰራል፣ ከሌለ default sans-serif ይጠቀማል */
}

body {
    background: #f4f7f6;
    color: #333;
    line-height: 1.6;
}

/* Navbar Styling */
.navbar1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #6665ee;
    padding: 15px 5%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar-brand1 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    text-decoration: none;
    letter-spacing: 1px;
}

.nav-links1 {
    display: flex;
    align-items: center;
    gap: 15px;
}

.nav-links1 a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 15px;
    transition: all 0.3s ease;
}

.nav-links1 a:hover {
    color: #ffc107; /* ወደ ቢጫነት ይቀየራል */
}

/* Logout Button */
.btn-light {
    background: #fff;
    border: none;
    padding: 7px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-light a {
    color: #6665ee !important;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 14px;
}

.btn-light:hover {
    background: #f0f0f0;
    transform: translateY(-2px);
}

/* Main Content Wrapper */
.content1 {
    max-width: 900px;
    margin: 60px auto;
    padding: 40px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    text-align: center;
}

.content1 h1 {
    font-size: 32px;
    color: #2d3436;
    margin-bottom: 15px;
}

.role-badge1 {
    font-size: 14px;
    background: #e9ecef;
    display: inline-block;
    padding: 6px 16px;
    border-radius: 20px;
    color: #495057;
    margin-bottom: 25px;
}

/* Alert Boxes */
.alert {
    padding: 15px;
    border-radius: 6px;
    margin-top: 20px;
    font-size: 15px;
    display: inline-block;
}

.alert-info {
    background-color: #e3f2fd;
    color: #0d47a1;
    border-left: 5px solid #2196f3;
}

.alert-secondary {
    background-color: #f8f9fa;
    color: #6c757d;
    border: 1px solid #dee2e6;
}

/* Dashboard Action Buttons */
.mt-4 a.btn-panel {
    display: inline-block;
    padding: 12px 30px;
    background: #ffc107;
    color: #000;
    text-decoration: none;
    font-weight: 600;
    border-radius: 6px;
    box-shadow: 0 4px 14px rgba(255, 193, 7, 0.4);
    transition: 0.3s ease;
}

.mt-4 a.btn-panel:hover {
    background: #e0a800;
    transform: scale(1.05);
}
    </style>
</head>
<body>
    <nav class="navbar1">
        <a class="navbar-brand1" href="#">Butajira Enterprise Office System</a>
        <div class="nav-links1">
            <?php if($role == 'admin'): ?>
                <a href="../admin/dashboard.php" class="btn-panel">Admin Panel</a>
            <?php endif; ?>
            
            <button type="button1" class="btn btn-light">
                <a href="logout-user.php">Logout</a>
            </button>
        </div>
    </nav>

    <div class="content1">
        <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
        <p class="role-badge1">Logged in as: <strong><?php echo ucfirst($role); ?></strong></p>
        
        <div class="mt-4">
            <?php if($role == 'admin'): ?>
                <div class="alert alert-info d-inline-block">
                    You have full access to manage users and view reports.
                </div>
            <?php else: ?>
                 <?php if($role == 'staff'): ?>
                <a href="../staff/staff_dashboard.php" class="btn-panel">Staff Panel</a>
            <?php endif; ?>
                <div class="alert alert-secondary d-inline-block">
                    You are logged in as a staff member.
                </div>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>