<?php 
session_start();

// PHPMailer ክፍሎችን ማስተዋወቅ
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// የፋይል መንገዶች ተስተካክለዋል
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// የዳታቤዝ ግንኙነት
include($_SERVER['DOCUMENT_ROOT'] . "/butajira_unemployment/database/db.php");

$email = "";
$name = "";
$errors = array();

// ኢሜል ለመላክ የሚያገለግል ፈንክሽን
function sendEmail($recipientEmail, $subject, $bodyContent) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'saeedhadiyu4@gmail.com'; 
        $mail->Password   = 'wnuk hflb nayi eeaz';    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('saeedhadiyu4@gmail.com', 'Butajira System');
        $mail->addAddress($recipientEmail);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyContent;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// 1. ተጠቃሚው ሲመዘገብ (Signup)
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered already exists!";
    }
    
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $role = "staff"; 
        
        $insert_data = "INSERT INTO usertable (name, email, password, code, status, role)
                        VALUES ('$name', '$email', '$encpass', '$code', '$status', '$role')";
        $data_check = mysqli_query($conn, $insert_data);
        
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is <b>$code</b>";
            
            if(sendEmail($email, $subject, $message)){
                $_SESSION['info'] = "We've sent a verification code to your email - $email";
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data!";
        }
    }
}

// 2. የኢሜል ማረጋገጫ ኮድ ሲገባ (OTP Verification)
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE email = '$email'";
        $update_res = mysqli_query($conn, $update_otp);
        
        if($update_res){
            $_SESSION['name'] = $fetch_data['name'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $fetch_data['role'];
            header('location: home.php'); 
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating status!";
        }
    }else{
        $errors['otp-error'] = "You've entered an incorrect code!";
    }
}

// 3. ተጠቃሚው ሲገባ (Login)
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        
        if(password_verify($password, $fetch_pass)){
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $fetch['role']; 
                header('location: home.php');
                exit();
            }else{
                $_SESSION['info'] = "Verify your email - $email";
                $_SESSION['email'] = $email;
                header('location: user-otp.php');
                exit();
            }
        }else{
            $errors['login-error'] = "Incorrect email or password!";
        }
    }else{
        $errors['login-error'] = "User not found!";
    }
}

// 4. የይለፍ ቃል ለመቀየር ኢሜል ሲላክ (Forgot Password)
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM usertable WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
        $run_query = mysqli_query($conn, $insert_code);
        
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is <b>$code</b>";
            if(sendEmail($email, $subject, $message)){
                $_SESSION['info'] = "We've sent a code to $email";
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}

// 5. የሪሴት ኮድ ማረጋገጫ (Check Reset OTP)
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $_SESSION['email'] = $fetch_data['email'];
        $_SESSION['info'] = "Please create a new password.";
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

// 6. አዲስ የይለፍ ቃል ሲመዘገብ (Change Password)
if(isset($_POST['change-password'])){
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email'];
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
        if(mysqli_query($conn, $update_pass)){
            $_SESSION['info'] = "Password changed successfully!";
            header('Location: password-changed.php');
            exit();
        }
    }
}

if(isset($_POST['login-now'])){
    header('Location: login-user.php');
    exit();
}
?>