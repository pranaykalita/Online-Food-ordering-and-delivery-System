<?php

$email = "pranaykalita1611@gmail.com";
$sub = "test subject";
$body = "test body";
$header = "From: pranaykalita2@gmail.com";

if(mail($email, $sub, $body,$header)) {
    echo "sent to $email..";
}else{
    echo "not sent";
}
?>