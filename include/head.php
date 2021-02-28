<?php
error_reporting(0);
session_start();
include('include/dbcon.php');
include('include/functions.php');
$sql1 = "SELECT `cat_name` FROM `menucategory_tb`";
$data1 = $conn->query($sql1);
while($row = $data1->fetch_assoc()){

	$sql = "SELECT * FROM `menuitems_tb` WHERE `menu_category` = '{$row["cat_name"]}'";
	$data = $conn->query($sql);
	$ne = mysqli_num_rows($data);
	if( $ne > 0){
		$sq = "UPDATE `menucategory_tb` SET `cat_status`= '1' WHERE `cat_name` = '{$row["cat_name"]}'";
		$conn->query($sq);
	}else if($ne = 1)
	{
		$sq = "UPDATE `menucategory_tb` SET `cat_status`= '0' WHERE `cat_name` = '{$row["cat_name"]}'";
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

<!-- localy import -->
	<!-- bootstrap -->
	<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">

	<!-- fontawsome -->
	<link rel="stylesheet" href="/vendor/fontawsome/css/all.css">

	<!-- datatables -->
	<link rel="stylesheet" href="/vendor/datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="/vendor/datatables/css/responsive.bootstrap4.min.css">

	<!-- owlcarousel -->
	<link rel="stylesheet" href="/vendor/owlcarousel2/css/owl.carousel.css">

	<!-- sweetalert -->
	<script src="/vendor/sweetalert/js/sweetalert.min.js"></script>
	
	
<!-- load form online -->

	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" /> -->

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" /> -->

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" /> -->

	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css"> -->