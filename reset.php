<?php 
session_start();
ob_start();
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
    <link rel="stylesheet" href="reset.css">
    <title>RESET PASSWORD</title>
</head>
<body>

<?php

include "db_conn.php";

if(isset($_POST['password'])){

    if(isset($_GET['otp'])){ 
        
        $otp = $_GET['otp'];
        
        $newpassword = $_POST['password'];
        
        $hash = password_hash($newpassword, PASSWORD_DEFAULT);

        $updatequery = " UPDATE users SET password='$hash', otp='' WHERE otp='$otp' ";

        $result = mysqli_query($conn, $updatequery);

        if($result){
            header("location: index.php?error=Your Password has been updated.");
        }else{
            header("location: reset.php?error=Unable to update Password");
        }
    
    }else{
        header("location: reset.php?error=Use the link provided in your email.");
    }
}

?>

    <div class="container">
        <div class="img">
            <img src="reset.jpg" alt="">
        </div>
        <div class="login-container">
            <form method="post" action="">
                <img class="avatar" src="favatar.svg" alt="">
                <h2>Welcome!</h2>
                <h3>Enter your new Password</h3>
                <br>
                <?php if(isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <style>
.error{
    background: #f2dede;
    color: #a94442;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
}
                </style>
                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <h5>Password</h5>
                            <input class="input" name="password" type="password" required>
                        </div>
                    </div>
                    
                    <button type="submit" name="submit" class="btn">Reset</button>
            </form>
        </div>
        <script src="script.js"></script>
    </div>
</body>
</html>