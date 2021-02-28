<?php 
include('../include/dbcon.php');

// edit category admin
if(isset($_POST['editbtn']))
{
	$id = $_POST['cat_id'];
	$res_array = [];

	$query = "SELECT * FROM `menucategory_tb` where `cat_id` = '{$id}'";
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

	$query = "SELECT * FROM `menuitems_tb` where `menu_id` = '{$id}'";
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
// edit staff  admin
if(isset($_POST['editemp']))
{
	$id = $_POST['empid'];
	$res_array = [];

	$query = "SELECT * FROM `staff_tb` WHERE `staff_id` = '{$id}'";
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
// edit adminpass  admin
if(isset($_POST['editpass']))
{
	$id = $_POST['adminid'];
	$res_array = [];

	$query = "SELECT * FROM `admin_tb` WHERE `admin_id` = '{$id}'";
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
	$id = $_POST['ord_view'];
	$query = "SELECT * FROM `allorders_tb` where `ord_id` = '{$id}'";
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
if(isset($_POST['view_neworder']))
{
	$id = $_POST['orderid'];
	$query = "SELECT * FROM `allorders_tb` where `ord_id` = '{$id}'";
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

if(isset($_POST['view_ordr_det']))
{
	$id = $_POST['ordno'];
	
	$query = "SELECT * FROM `allorders_tb` where `ord_id` = '{$id}'";

	$data = $conn->query($query);

	$res_array = [];

	if(mysqli_num_rows($data) > 0){
		foreach($data as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
	
}

// view  delivery details admin

if(isset($_POST['delyvbtn']))
{
	$id = $_POST['orddelid'];
	
	$query = "SELECT * FROM `allorders_tb` where `ord_id` = '{$id}'";
	$data = $conn->query($query);

	$res_array = [];

	if(mysqli_num_rows($data) > 0){
		foreach($data as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
	
}

// view  delivery details itm admin
if(isset($_POST['vorddel']))
{
	$id = $_POST['vordid'];
	$query = "SELECT * FROM `allorders_tb` where `ord_id` = '{$id}'";
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


