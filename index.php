

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
    <title>LOG IN FORM</title>
</head>
<body>
    <img class="wave" src="img1.png" alt="">
    <div class="container">
        <div class="img">
            <img src="login.svg" alt="">
        </div>
        <div class="login-container">
            <form method="post" action="login.php">
                <img class="avatar" src="avatar.svg" alt="">
                <h2>Welcome!</h2>
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
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" name="email" type="email" required>
                    </div>
                    </div>

                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <h5>Password</h5>
                            <input class="input" name="password" type="password" required>
                        </div>
                    </div>

                    <div class="links">
                        <a href="register.php" >Not a Member?</a>
                        <a href="forgot.php" >Forgot Password?</a>
                    </div>
                    <style>
                        .links{
                            display: flex;
                            justify-content: space-between;
                        }
                    </style>
                    
                    <button type="submit" name="submit" class="btn">Log In</button>
            </form>
        </div>
        <script src="script.js"></script>
    </div>
</body>
</html>










