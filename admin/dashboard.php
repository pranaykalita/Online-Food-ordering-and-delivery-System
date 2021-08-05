<?php 
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');

// pending order
$sql = "SELECT count(`ord_id`) FROM `allorders_tb` WHERE `ord_status` = '0' or `ord_status` = '1'";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$pending_order = $result[0];

//  order delevered
$sql = "SELECT count(`ord_id`) FROM `allorders_tb` WHERE `ord_status` = '3'";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$delevered = $result[0];


// total income
$sql = "SELECT sum(`ord_totlprice`) as totalincm FROM `allorders_tb` WHERE `ord_status` = '3' ";
$data= $conn->query($sql);
$result = $data->fetch_assoc();
$total_earnings = $result["totalincm"];

// total delivert
$sql = "SELECT count(`id`) FROM `delivery_tb` WHERE `del_status` = 0";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$delavl = $result[0];

?>
<!-- update page data by refressing every 10sec -->
<!-- <meta http-equiv="refresh" content="10"> -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="row">
                <!-- Orders (pending) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-5">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_order; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders (delivered) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-5">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Orders
                                        Delevered
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?php echo $delevered; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (total) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-5">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Earnings (Total)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?php echo $total_earnings; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- staff (total) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-5">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Available Delivery Rider</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $delavl; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-4" >
           <!-- sdie note -->
           <!-- calender -->
           <div class="shadow rounded shadow calender">
               
               <div>
               
                <h2 id="date"><?php echo date("d") ?><span id="month"><?php echo date("F") ?></span></h2>
                <p id="day">Wednessday</p>
                <p class="text-light" id="topclock"></p>
               </div>
               
           </div>
           
          
        </div>
    </div>


    <!-- Content Row -->
    <div class="row">

    </div>
    <div class="row">

    </div>

    <!-- Content Row -->

    <div class="row">
        <!--new orders -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">New Order Status</h6>
                </div>
                <!-- recent order Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="pt-2 pb-2">
                            <table class="table" id="dataTable">
                                <thead>
                                    <th>order No</th>
                                    <th>Total</th>
                                    <th>status</th>
                                    <th>action</th>
                                </thead>
                                <tbody>
                                    <?php
                                $query ="SELECT * FROM `allorders_tb` WHERE `ord_status` = '0' or `ord_status`= '1' ORDER BY `ord_id` DESC";
                                $result = $conn->query($query);
                                while($row = $result->fetch_assoc())
                                {
                                    echo '
                                    <tr>
                                    <td>'.$row["invid"].'</td>
                                    <td>'.$row["ord_totlprice"].'</td>';
                                    if($row["ord_status"] == 0)
                                    {
                                        echo '<td class="text-danger">New</td>';
                                    }else if($row["ord_status"] == 1)
                                    {
                                        echo '<td class="text-success">Cooking</td>';
                                    }
                                    echo  '<td><a href="neworders.php" class="btn btn-primary">View</a></td>';
                                    
                                    echo '</tr>';
                                }
                                
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- delivery out of -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Active Delivery</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="pt-2 pb-2">
                            <table class="table" id="dataTable3">
                                <thead>
                                    <th>Order id</th>
                                    <th>Delivery Person</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    <?php

                                $sqlf = "SELECT * FROM `allorders_tb` WHERE `ord_status` = 2";
                                $datax = $conn->query($sqlf);
                                while($rowd = $datax->fetch_assoc()){
                                    echo '
                                    
                                    <tr>
                                        <td class="delordid" style="display: none;">'.$rowd["ord_id"].'</td>
                                        <td >'.$rowd["invid"].'</td>
                                        <td>'.$rowd["del_per"].'</td>
                                        <td>'.$rowd["del_phone"].'</td>
                                        <td class="text-success"><i class="fas fa-motorcycle"></i> Out For Delivery</td>
                                        <td><a href="delivery.php" class="btn btn-success">Confirm</a> </td>
                                    </tr>';
                                     
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- line Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -  -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sales Overview</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->
    <?php include('common/footer.php')?>