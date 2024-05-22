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
    <link rel="stylesheet" href="forgot.css">
    <title>FORGOT PASSWORD</title>
</head>
<body>

    <div class="container">
        <div class="img">
            <img src="forgot.jpg" alt="">
        </div>
        <div class="login-container">
            <form method="post" action="forgotpass.php" >
                <img class="avatar" src="favatar.svg" alt="">
                <h2>Welcome!</h2>
                <h3>Enter your existing Email</h3>
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
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" name="email" type="email" required>
                    </div>
                    </div>

                    <button type="submit" name="submit" class="btn">Send</button>
            </form>
        </div>
        <script src="script.js"></script>
    </div>
</body>
</html>