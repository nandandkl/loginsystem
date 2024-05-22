<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'id20746598_test_db');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $check_duplicate = "SELECT * FROM id20746598_test_db.users WHERE email = '$email'";
        $result = mysqli_query($conn, $check_duplicate);

        if (mysqli_num_rows($result) > 0) {
            header("location: register.php?error=Duplicate email address");
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $otp = substr(str_shuffle("0123456789"), 0, 6);

            $insert_user = "INSERT INTO id20746598_test_db.users (email , uname , password , otp , status) VALUES ('$email','$uname' , '$hash' , '$otp' , 'inactive' )";
            mysqli_query($conn, $insert_user);

            require 'phpmailer/src/Exception.php';
            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/SMTP.php';

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
                $mail->isHTML(true);
                $mail->Subject = 'Verification Mail';
                //$mail->Body = "Hi $uname, Your OTP for account activation is: $otp";
                $mail->Body = "
            <!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Interactive OTP Email</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .otp-container {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      animation: fade-in 0.5s ease-in-out;
      position: relative;
    }

    @keyframes fade-in {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .otp-button {
      font-size: 24px;
      color: #3498db;
      background-color: #ffffff;
      border: 2px solid #3498db;
      border-radius: 10px;
      padding: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .otp-button:hover {
      background-color: #f5f5f5;
    }

    .tooltip {
      position: absolute;
      top: calc(-100% - 10px); /* Adjusted vertical position */
      left: 50%;
      transform: translateX(-50%);
      z-index: 2;
      padding: 10px;
      border-radius: 5px;
      background-color: #3498db;
      color: #fff;
      text-align: center;
      font-weight: bold;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease-in-out;
    }

    .tooltip::before {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #3498db transparent transparent transparent;
    }

    .show-tooltip .tooltip {
      opacity: 1;
      visibility: visible;
    }
  </style>
</head>
<body>

<div class='otp-container'>
  <h2 style='color: #333;'>OTP Verification</h2>
  <p style='color: #555;'>Hi $uname, Use the following OTP for verification:</p>
  <button class='otp-button' onclick='copyOTP()'>$otp</button>
  <div class='tooltip'>Copied!</div>
</div>

<script>
  function copyOTP() {
    const otpValue = $otp;
    const tempInput = document.createElement('input');
    tempInput.value = otpValue;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    const tooltip = document.querySelector('.tooltip');
    tooltip.classList.add('show-tooltip');

    setTimeout(() => {
      tooltip.classList.remove('show-tooltip');
    }, 1000);
  }
</script>

</body>
</html>

";

                $recipients = [$email]; 

                foreach ($recipients as $recipient) {
                    $mail->addAddress($recipient, $uname);
                    $mail->send();
                    $mail->clearAddresses();
                }

                header("location: otp.php?error=Check your email to activate your account");
            } catch (Exception $e) {
                header("location: register.php?error=Failed to send OTP");
            }
        }
    }
}
