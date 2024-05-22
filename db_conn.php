<?php 
 
$sname = "localhost";
$email = "root";
$password = "";

$db_name = "id20746598_test_db";

$conn = mysqli_connect($sname, $email, $password, $db_name);

if(!$conn){
    echo "Connection Failed!";
}

?>