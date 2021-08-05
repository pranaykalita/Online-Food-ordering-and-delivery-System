<?php
error_reporting(0);
define('delimg' , "./assets/userimg/");
$servername = "localhost";
$Server_username = "root";
$password = "";
$dbname = "foodzilla";

$conn = new mysqli($servername,$Server_username,$password,$dbname);

if($conn->connect_error){
    die("con failed");
}
?>
