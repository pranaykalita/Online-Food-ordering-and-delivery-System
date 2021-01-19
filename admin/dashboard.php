<?php 
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');

// pending order
$sql = "SELECT count(`ord_id`) FROM `orders_all` WHERE `ord_status` = '0' or `ord_status` = '1'";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$pending_order = $result[0];

//  order delevered
$sql = "SELECT count(`ord_id`) FROM `orders_all` WHERE `ord_status` = '3'";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$delevered = $result[0];


// total income
$sql = "SELECT sum(`ord_totlprice`) as totalincm FROM `orders_all` WHERE `ord_status` = '3' ";
$data= $conn->query($sql);
$result = $data->fetch_assoc();
$total_earnings = $result["totalincm"];

// total staff
$sql = "SELECT count(`staff_id`) FROM `staff_tb`";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$staff = $result[0];

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Orders (pending) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_order; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders (delivered) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Orders
                                Delevered
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $delevered; ?>
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?php echo $total_earnings; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- staff (total) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Employees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $staff; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Pending Orders</h6>
                </div>

                <!-- Card Body -->
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="pt-2 pb-2">
                                <table class="table">
                                    <thead>
                                        <th>id</th>
                                        <th>Total</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                $query ="SELECT * FROM `orders_all` WHERE `ord_status` = '0' or `ord_status`= '1' ORDER BY `ord_id` desc";
                                $result = $conn->query($query);
                                while($row = $result->fetch_assoc())
                                {
                                    echo '
                                    <tr>
                                    <td>1</td>
                                    <td>pranay</td>';
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
    </div>
    
    <!-- delivery out of -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Out For Delivery</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <th>Order id</th>
                                <th>Delivery Person</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                
                                <?php

                                $sql = "SELECT * FROM `orders_all` WHERE `ord_status` = 2";
                                $data = $conn->query($sql);
                                while($row = $data->fetch_assoc()){
                                    echo '
                                    
                                    <tr>
                                        <td class="delordid">'.$row["ord_id"].'</td>
                                        <td>'.$row["del_per"].'</td>
                                        <td>'.$row["del_phone"].'</td>
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

    <!-- End of Main Content -->
    <?php include('common/footer.php')?>