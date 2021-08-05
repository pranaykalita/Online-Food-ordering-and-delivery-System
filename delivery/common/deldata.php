<?php 
session_start();
include("../common/database.php");

// deliveryOrd.php
if(isset($_POST['view_delord']))
{
	$invoice = $_POST['invoiceid'];

	$query = "SELECT * FROM `allorders_tb` where `invid` = '{$invoice}'";
	$data = $conn->query($query);
	
	$row = $data->fetch_assoc();

	$array = $row["ord_items"];
	$unser_itm = unserialize($array);
	
	foreach($unser_itm as $key => $value)
	{
		echo '
		<tr>
		<td>'.$value["Item_name"].'</td>
		<td>'.$value["quantity"].'</td>
		<td>'.$value["Item_price"].'</td>
		</tr>';
	}
	
}
// record.php
if(isset($_POST["Rview"]))
{
	$invoice = $_POST['invoice'];
	
	$query = "SELECT * FROM `allorders_tb` where `invid` = '{$invoice}'";
	$data = $conn->query($query);
	
	$row = $data->fetch_assoc();

	$array = $row["ord_items"];
	$unser_itm = unserialize($array);
	
	foreach($unser_itm as $key => $value)
	{
		echo '
		<tr>
		<td>'.$value["Item_name"].'</td>
		<td>'.$value["quantity"].'</td>
		<td>'.$value["Item_price"].'</td>
		</tr>';
	}

}

// index.php

if(isset($_POST["checkbtn"]))
{
	$deliveryid = $_SESSION["deliveryid"];
	$query = "SELECT * FROM `allorders_tb` WHERE `ord_status` = 2 AND `del_per` = '$deliveryid'";
	$data = $conn->query($query);

	if(mysqli_num_rows($data) > 0)
	{
		echo '<p class="text-success text-center loaddata" style="font-size:2rem;">New Delivery Available</p>';
	}
	else
	{
		echo '<p class="text-danger text-center loaddata" style="font-size:2rem;">No Delivery Available</p>';
	}
}


?>