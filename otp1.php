<?php
session_start();
ob_start();

include "db_conn.php";

if (isset($_POST['submit'])) {
   $otp = $_POST['otp'];

    $selectQuery = "SELECT otp FROM users WHERE otp='$otp'";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $otp = $row['otp'];
        header("location: reset.php?otp=". urlencode($otp));
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d2babf483.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
    <title>OTP VERIFICATION</title>
</head>
<body>
    <div class="container">
        <div class="img">
            <img src="otp.jpg" alt="">
        </div>
        <div class="login-container">
            <form method="post" action="">
                <img class="avatar" src="avatar.svg" alt="">
                <h2>Welcome!</h2>
                <?php if(isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <style>
                    .error {
                        background: #f2dede;
                        color: #a94442;
                        padding: 10px;
                        width: 95%;
                        border-radius: 5px;
                    }
                </style>
                <div class="input-div">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>OTP</h5>
                        <input class="input" name="otp" type="text" required pattern="[0-9]*" inputmode="numeric" maxlength="6">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn">Verify OTP</button>
            </form>
        </div>
        <script src="script.js"></script>
    </div>
    
</body>
</html>
