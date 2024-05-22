<?php
session_start();
include 'db_conn.php';

if(isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    
    $updatequery = "UPDATE users SET status='active', otp='' WHERE otp='$otp'";
    $query = mysqli_query($conn, $updatequery);

    if($query) {
        header("Location: index.php?error=Email Verified!");
        exit();
    } else {
        header("Location: otp.php?error=Failed to verify OTP");
        exit();
    }
}
?>
