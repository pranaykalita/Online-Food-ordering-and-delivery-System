<?php
header('Content-Type: application/json');

include('../../include/dbcon.php');


$query = "SELECT sum(ord_totlprice) as totalrevnue, MONTHNAME(ord_date) as month  FROM `allorders_tb` WHERE `ord_status`= '3' group by month(ord_date)";
$result = $conn->query($query);

$data = array();
foreach($result as $row)
{
    $data[] = $row;
}
print json_encode($data);


?>

