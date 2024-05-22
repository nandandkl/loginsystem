<?php

include "db_conn.php";

session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; }

    $email = validate($_POST['email']) ;
    $password =  validate($_POST['password']) ;

    if(empty($email)){
        header("location: index.php?error=Email is required");
        exit();
    }

    else if(empty($password)){
        header("location: index.php?error=Password is required");
        exit();  
    }

    else{
        
        $sql = "SELECT * FROM users WHERE email = '$email' and status = 'active' ";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['password'])){
                    
                    $_SESSION['uname'] = $row['uname'];

                    header("location: home.php");
                    exit();                                         
                }
                else{
                    header("location: index.php?error=Invalid Credentials");
                    exit();
                }
            }
        }
        
        else{
            header("location: index.php?error=Invalid Credentials");
            exit();
        }

    }

}

else{
    exit();
}

?>

