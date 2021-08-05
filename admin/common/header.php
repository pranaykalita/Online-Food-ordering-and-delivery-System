<!DOCTYPE html>
<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION["aemail"]))
{
    header("LOCATION: /");
}
error_reporting(0);

include('../include/dbcon.php');
include('../include/functions.php');

// new notifications order
$sql = "SELECT count(`ord_id`)FROM `allorders_tb` WHERE `ord_status` = '0'";
$data= $conn->query($sql);
$result = mysqli_fetch_row($data);
$countnotific = $result[0];

$sql3 = "SELECT * FROM `allorders_tb`";
$data3 = $conn->query($sql3);

?>


<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo TITLE ?></title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- calender-->
    <link rel="stylesheet" href="css/calender.css">
</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-coffee"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FOODZILLA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
                    aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-utensils"></i>
                    <span>Orders</span>
                </a>
                <div id="collapseOrders" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="neworders.php">manage Orders</a>
                        <a class="collapse-item" href="orders.php">All Orders </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="delivery.php">
                    <i class="fas fa-motorcycle"></i>
                    <span>delivery</span></a>
            </li>
            
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="category.php">
                    <i class="fas fa-list-alt"></i>
                    <span>Category</span></a>
            </li>
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="menu.php">
                    <i class="fas fa-book-open"></i>
                    <span>Menu</span></a>
            </li>
            
            
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="billing.php">
                    <i class="fas fa-receipt"></i>
                    <span>Billing</span></a>
            </li>
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-users"></i>
                    <span>Users</span></a>
            </li>
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="staff.php">
                    <i class="fas fa-users"></i>
                    <span>Staff</span></a>
            </li>
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                    <i class="fas fa-comment-alt"></i>
                    <span>User Feedback</span></a>
            </li>

            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="settings.php">
                    <i class="fas fa-cogs"></i>
                    <span>Settings</span></a>
            </li>
            <!-- Nav Item - -->
            <li class="nav-item">
                <a class="nav-link" href="/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1 ">
                            <a class="nav-link dropdown-toggle readnotific" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>

                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter count-number"></span>
                                
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    New orders
                                </h6>
                                <div class="notidetails">
                                    <a class="dropdown-item d-flex align-items-center" href="neworders.php">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-white">
                                                <i class="fas fa-pizza-slice text-success"></i>
                                            </div>
                                        </div>
                                        <!-- count order -->
                                        <!-- <div> -->
                                            <!-- <div class="small text-gray-500">New Order</div>
                                            <span class="font-weight-bold notidetails" id="notidetails">Order <span class="text-danger"></span> is recived on <span class="text-success"></span> <span class="text-warning"></span></span> -->
                                            
                                        <!-- </div> -->
                                    </a>
                                </div>
                                
                               
                                <a  class="dropdown-item text-center small text-gray-500" href="neworders.php">Show All Orders</a>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["aname"]; ?></span>
                                <img class="img-profile rounded-circle" src='<?php echo  admin_img.$_SESSION["aimg"]; ?>' />
                                <!-- <button class="btn read">read</button> -->
                                <div class="count-menu">
                                        <div class="count"></div>
                                </div>
                            </a>
                        </li>

                        
                    </ul>
                </nav>

                <!-- End of Topbar -->