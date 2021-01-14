<?php
include('include/dbcon.php');
if(isset($_POST["user_name"]))
{
    $username = $_POST["user_name"];
    $query = "SELECT * FROM `user_details` WHERE `uname` = '{$username}'";
    $res = $conn->query($query);
    echo mysqli_num_rows($res);
}
?>