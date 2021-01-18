<?php 
include('../include/dbcon.php');

// edit category admin
if(isset($_POST['editbtn']))
{
	$id = $_POST['cat_id'];
	$res_array = [];

	$query = "SELECT * FROM `menu_category` where `cat_id` = '{$id}'";
	$data = $conn->query($query);

	if(mysqli_num_rows($data) > 0){
		foreach($data as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}

}

// edit menu item admin
if(isset($_POST['editmenu']))
{
	$id = $_POST['menuid'];
	$res_array = [];

	$query = "SELECT * FROM `menu_items` where `menu_id` = '{$id}'";
	$data = $conn->query($query);

	if(mysqli_num_rows($data) > 0){
		foreach($data as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}

	
}

// ord view user
if(isset($_POST['chek_viewBtn']))
{
	$id = $_POST['stud_ifBtn'];
	$query = "SELECT * FROM `orders_all` where `ord_id` = '{$id}'";
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

// view pending order admin
if(isset($_POST['viewBtn']))
{
	$id = $_POST['order_id'];
	$query = "SELECT * FROM `orders_all` where `ord_id` = '{$id}'";
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

// data line chart index.php

