<?php
error_reporting(0);
define("IMAGE", "../images/" );
define('dish_image' , "../images/dish/");
define('user_image' , "../images/users/");

$servername = "localhost";
$Server_username = "root";
$password = "";
$dbname = "coders";

$conn = mysqli_connect($servername,$Server_username,$password,$dbname);

if($conn){
    // echo "connection ok";
}else{
    echo "connection failed".mysqli_connect_error();
}

?>