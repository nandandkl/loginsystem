<?php

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "db_conn.php";

if (isset($_POST['email'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    if (empty($email)) {
        header("location: index.php?error=Email is required");
        exit();
    } else {

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $otp = substr(str_shuffle("0123456789"), 0, 6);
        
        

        if (mysqli_num_rows($result)) {
             $update_user = "UPDATE users SET otp='$otp' WHERE email='$email'";
            mysqli_query($conn, $update_user);
            
            
            $userdata = mysqli_fetch_array($result);
            $uname = $userdata['uname'];

            $mail = new PHPMailer(true);

            try {
               
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'loginform9@gmail.com';
                $mail->Password = 'jquozwpubdikbxex'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

              
                $mail->setFrom('loginform9@gmail.com'); 
                $mail->addAddress($email, $uname);

              
                $mail->isHTML(true);
                $mail->Subject = "Password Reset Mail";
                $mail->Body = "Hi $uname, Your OTP for Password Reset is: $otp";

                $mail->send();
                header("location: otp1.php?error=Check your email to reset your password");
            } catch (Exception $e) {
                header("location: forgot.php?error=Failed to send OTP");
            }
        } else {
            header("location: forgot.php?error=Invalid Email");
            exit();
        }
    }
}
?>
