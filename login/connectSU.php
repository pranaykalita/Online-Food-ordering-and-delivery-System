<?php
$host="localhost";
$dbusername="root";
$dbpassword='';
$dbname="signup";

    $name = $_POST ['name'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $re_password = $_POST ['re_password'];
//connection

$conn = new mysqli ('localhost','root','','signup');
if (mysqli_connect_error()){
   die('connect_error('.mysqli_connect_errno().') '
   .mysqli_connect_error());
} 
else{
    $sql =" INSERT INTO registration ( name, email, password, re_password )
    VALUES ('$name', '$email' , '$password' , '$re_password' )";
    if($conn->query($sql )){
        echo "new record is inserted successfully";

    }
    else{
        echo "Error:" .$sql."<br>".$conn->error;
    }
$conn->close();
  
}

?>