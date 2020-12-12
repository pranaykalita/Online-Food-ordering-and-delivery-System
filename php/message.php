<?php 
$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['email'];
$msg = $_POST['message'];

if($name !="" && $phone !="" && $mail !="" && $msg !="" ){

    $query = "INSERT INTO messages( `name`, `phone`, `email`, `message`) VALUES ('$name','$phone','$mail','$msg')";
    $data = mysqli_query($conn,$query);
}

?>