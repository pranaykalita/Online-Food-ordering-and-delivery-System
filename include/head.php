<?php
error_reporting(0);
session_start();
include('include/dbcon.php');
include('include/functions.php');
$sql1 = "SELECT `cat_name` FROM `menu_category`";
$data1 = $conn->query($sql1);
while($row = $data1->fetch_assoc()){

	$sql = "SELECT * FROM `menu_items` WHERE `menu_category` = '{$row["cat_name"]}'";
	$data = $conn->query($sql);
	$ne = mysqli_num_rows($data);
	if( $ne > 0){
		$sq = "UPDATE `menu_category` SET `cat_status`= '1' WHERE `cat_name` = '{$row["cat_name"]}'";
		$conn->query($sq);
	}else if($ne = 1)
	{
		$sq = "UPDATE `menu_category` SET `cat_status`= '0' WHERE `cat_name` = '{$row["cat_name"]}'";
		$conn->query($sq);
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title><?php echo TITLE ?></title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
