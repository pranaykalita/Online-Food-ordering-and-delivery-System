<?php include("./common/header.php"); 
session_start();
if(isset($_SESSION["deliveryid"]))
{
    header("login.php");
}

$deliveryid = $_SESSION["deliveryid"];
// count total delivered
$sql = "SELECT count(`ord_id`) FROM `allorders_tb` WHERE `del_per` = '{$deliveryid}' AND `ord_status` = 3 OR `ord_status` = 5";
$data = $conn->query($sql);
$result = mysqli_fetch_row($data);
$delattempt = $result[0];

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card  text-white mb-4 py-5 calender">
                    <h2 id="date"><?php echo date("d") ?><span id="month"><?php echo date("F") ?></span></h2>
                    <p class="text-light" id="topclock"></p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-success text-white mb-4 py-5 calender">
                    <h3 class="attamtfont">Total Delivery Attempt</h3>
                    <a href="records.php" id="date" style="color:#ff7675;text-decoration:none;" ><?php echo $delattempt; ?></a>
                    </div>
                </div>
                
                
            </div>
           
            <div class="card m-4">
                <div class="card-header">
                Notification
                </div>
               
               
                <div class="card shadow d-flex align-center justify-content-center">
                    <a href="deliveryOrd.php" class="btn btn-success text-center m-2 "> Check Now</a>
                    <div class="loaddata"></div>
                    
                </div>

            </div>
        </div>
    </main>
    <?php include("./common/footer.php");