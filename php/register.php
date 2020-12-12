<?php
error_reporting(0);
// get indput data
$username = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['passwd'];
$terms = $_POST['agree-term'];
$msg = "";

if(isset($_POST['signup']))
{
   
      // hash password
   $hashpass = password_hash($password ,PASSWORD_DEFAULT);
   
   //  check exist or not
    $selquary = "SELECT * FROM `users` WHERE email = '$email' ";
    $data = mysqli_query($conn , $selquary);
    $return = mysqli_num_rows($data);
   
    if($return>0) {
       $msg = "email exist . <a href='login.php'> please login</a>";
      } 
      //if not
      else{
         $query =  "INSERT INTO users(`name`, `email`, `phone`, `password`, `terms`) VALUES ('$username','$email','$phone','$hashpass','$terms')";
         $data = mysqli_query($conn,$query);
         $msg = "account created. please login";
         $conn -> close();
        
      }
   }

?>