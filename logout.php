<!-- if(!isset($_SESSION["username"]))
{
	header("LOCATION: /index.php");
} -->

<?php

session_start();
session_unset();
session_destroy();

header("LOCATION: /index.php");

?>