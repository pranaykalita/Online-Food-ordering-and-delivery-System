<?php

$servername = "localhost";
$Server_username = "root";
$password = "";
$dbname = "coders";

$conn = new mysqli($servername,$Server_username,$password,$dbname);

if($conn->connect_error){
    die("con failed");
}
?>
