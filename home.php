<?php

session_start();

include 'db_conn.php';


if(isset($_GET['otp'])){

    $otp = $_GET['otp'];

    $updatequery = " UPDATE users set status='active' where otp= '$otp' ";

    $query = mysqli_query($conn,$updatequery);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <div class="nav">
  <ul class="nav-links">
    <li class="forward"><a href="calcindex.html">Calculator</a></li>
    <li class="forward"><a href="#">Tic Tac Toe</a></li>
    <li class="forward"><a href="#">Digital Clock</a></li>
    <li class="forward"><a href="#">Quiz Game</a></li>
  </ul>
  </div>
<div class="container">
    <div class="img">
            <img src="homepagee.jpg" alt="">
        </div>
        <div class="login-container">

        <form method="post" action="index.php">
                <img class="avatar" src="havatar.svg" alt="">
                <h1>Welcome!</h1>
                <h2><?php
                echo $_SESSION['uname'];
                ?></h2>
                    <button type="submit" class="btn">Log Out</button>
            </form>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

*{
    padding: 0;
    margin: 0%;
    box-sizing: border-box;
  }
  
  body{
    font-family: 'Poppins', sans-serif;
  }
  
  .container{
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 7rem;
    padding: 1 2rem;
  }
  
  .img{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    opacity: 1.4;
  }
  
  .img img{
    width: 500px;
  }
  
  .login-container{
    display: flex;
    align-items: center;
    text-align: center;
    margin: 1rem 5rem;
  }

  .avatar{
    width: 20%;
    height: 20%;
  }
  
  form h2{
    font-size: 2.9rem;
    text-transform: uppercase;
    margin: 15px 0;
    color: #333;
  }
  
  a{
    display: block;
    text-align: right;
    text-decoration: none;
    color: #999;
    font-size: 0.9rem;
    transition: .3s;
  }
  
  a:hover{
    color: #1c5e4883;
  }
  
  .btn{
    display: block;
    width: 100%;
    height: 50px;
    border-radius: 25px;
    margin: 1rem 0;
    font-size: 1.2rem;
    outline: none;
    border: none;
    background-image: linear-gradient(to right, #5642ac, #d338d3, #b60070);
    cursor: pointer;
    color: #fff;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
    background-size: 200%;
    transition: .5s;
  }
  
  .btn:hover{
    background-position: right;
  }
  
  @media screen and (max-width: 1050px){
    .container{
        grid-gap: 5rem;
    }
  }
  
  @media screen and (max-width: 1000px){
    form{
        width: 290px;
    }
    form h2{
        font-size: 2.4rem;
        margin: 8px 0;
    }
  
    .img img{
        width: 400px;
    }
  
  }
  
  @media screen and (max-width: 900px){
  
    .img{
        display: none;
    }
  
    .container{
        grid-template-columns: 1fr;
    }
  
    .login-container{
        justify-content: center;
    }
  
  }
  
   .nav{
    position: fixed;
  height: 10vh;
  width: 100vw;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0px;
  padding: 0px;
}
.nav-links{
  display: flex;
  align-items: center;
  background: #c4f5e9;
  padding: 20px 15px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.nav-links li{
  list-style: none;
  margin: 0 12px;
}
.nav-links li a{
  position: relative;
  color: #333;
  font-size: 20px;
  font-weight: 500;
  padding: 6px 0;
  text-decoration: none;
}
.nav-links li a:before{
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  width: 0%;
  background: #347fef;
  border-radius: 12px;
  transition: all 0.4s ease;
}
.nav-links li a:hover:before{
  width: 100%;
}
.nav-links li.forward a:before{
  width: 100%;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.4s ease;
}
.nav-links li.forward a:hover:before{
  transform: scaleX(1);
  transform-origin: left;
}
  
            </style>
            </div>
        <script src="script.js"></script>
    </div>
</body>
</html>