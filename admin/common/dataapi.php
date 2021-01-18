<?php
header('Content-Type: application/json');

$servername = "localhost";
$Server_username = "root";
$password = "";
$dbname = "coderscafe";

$conn = new mysqli($servername,$Server_username,$password,$dbname);


$query = "SELECT sum(ord_totlprice) as totalrevnue, MONTHNAME(ord_date) as month  FROM `orders_all` group by month(ord_date)";
$result = $conn->query($query);

$data = array();
foreach($result as $row)
{
    $data[] = $row;
}
// pie
$query2 = "SELECT `ord_status` FROM `orders_all`";
$result2 = $conn->query($query2);

$data2 = array();
foreach($result2 as $row2)
{
    $data2[] = $row2;
}

print json_encode($data);
print json_encode($data2);
?>