<?php
include('include/dbcon.php');
if(isset($_POST["user_name"]))
{
    $username = $_POST["user_name"];
    $query = "SELECT * FROM `users_tb` WHERE `uname` = '{$username}'";
    $res = $conn->query($query);
    echo mysqli_num_rows($res);
}
// email
if(isset($_POST["user_email"]))
{
    $usermail = $_POST["user_email"];
    $query = "SELECT * FROM `users_tb` WHERE `umail` = '{$usermail}'";
    $res = $conn->query($query);
    echo mysqli_num_rows($res);
}
?>