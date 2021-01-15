<?php 
include('include/dbcon.php');

if(isset($_POST['chek_viewBtn']))
{
    $id = $_POST['ord_ifBtn'];
    
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
?>