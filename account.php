<?php
define("TITLE" , "FOODZILLA | Cart");
include('include/dbcon.php');
include('include/head.php'); 

if(!isset($_SESSION["username"]))
{
	header("LOCATION: /login.php");
}
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/account.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" href="css/newaccount.css" />

</head>

<body>

    <?php include('include/header.php'); 

// update profile
if(isset($_REQUEST['uupdate'])){

    $firstname = $_REQUEST['ufname'];
    $lastname = $_REQUEST['ulname'];
    $phone = $_REQUEST['uphn'];
    $addrs = $_REQUEST['uaddr'];


    $sql = "UPDATE `users_tb` SET `Fname`='$firstname',`Lname`='$lastname',`uphone`='$phone',`uadd`='$addrs' WHERE uname = '{$_SESSION["username"]}'";
    $conn->query($sql);
    echo '<script>
    swal({
        title: "Details Updated",
        icon: "success",
        button: "close",
        type: "success"
    });
    </script>';
}

// update password
if(isset($_POST["uppass"]))
{
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];

    // get old password data
    $sql = "SELECT `upass` FROM `users_tb` WHERE `uid` = '{$_SESSION["userid"]}'";
    $data=$conn->query($sql);
    $row = $data->fetch_assoc();
    if($oldpass == $row["upass"])
    {
        $new = "UPDATE `users_tb` SET `upass`= '$newpass' WHERE `uid` = '{$_SESSION["userid"]}'";
        $conn->query($new);
        echo '<script>
        swal({
            title: "Password Updated",
            text: "please login again",
            icon: "success",
            button: "close",
            type: "success"
        }).then(function() {
            window.location = "logout.php";
        });
        </script>';
        header("LOCATION: /logout.php");
    }
    else{
        echo '<script>
        swal({
            title: "Wrong Password",
            text: "please try again",
            icon: "error",
            button: "close",
            type: "success"
        });
        </script>';
    }
}

// GET PROFILE DATA
$sql = "SELECT * FROM `users_tb` WHERE `uid` = '{$_SESSION["userid"]}'";
$data = $conn->query($sql);
$profrow = $data->fetch_assoc();

?>
    <!-- strt update -->
    <div class="row pb-5">
        <div class="col">


            <div class="row account">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-settings-tab" data-toggle="pill"
                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">
                            <i class="fa fa-check mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Track Orders</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-sticky-note mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Orders</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-home-tab" data-toggle="pill"
                            href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
                            <i class="fa fa-user mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Profile</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill"
                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-cog mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Settings</span></a>

                    </div>
                </div>


                <div class="col-md-9">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- tracking order -->
                        <div class="tab-pane fade shadow rounded bg-white show active p-0 p-md-3 " id="v-pills-settings"
                            role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <h4 class="text-md-left text-center p-3">Track Orders </h4>
                            <!-- chek order available or not -->
                            <?php
                            $trsql = "SELECT * FROM `allorders_tb` WHERE (`ord_status` = 0 OR `ord_status` = 1 OR `ord_status` = 2) AND ( `ord_acid` = '{$_SESSION["userid"]}' ) ORDER BY `ord_id` DESC";
                            // echo $trsql;
                            $trdata = $conn->query($trsql);

                            if(mysqli_num_rows($trdata) > 0)
                            {
                               while($trrow = $trdata->fetch_assoc())
                               {

                                // format date
                                $trdate = strtotime($trrow["ord_date"]);
                                $fortrdate = date("d-M-Y",$trdate);

                                $trtime = strtotime($trrow["ord_time"]);
                                $fortrtime = date("h:i a",$trtime);

                                
                                
                                   echo '
                                   <!-- order status -->
                                    <div class="card px-2 my-4">
                                        <div class="card-header bg-white">
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <p class="text-muted"> Invoice ID <span class="font-weight-bold text-dark">'.$trrow["invid"].'</span></p>
                                                    <p class="text-muted"> Place On <span class="font-weight-bold text-dark">'.$fortrtime.'</span> '.$fortrdate.'</p>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="media flex-row flex-sm-row">
                                                <div class="media-body ">
                                                    <p class="text-muted">Total Bill</p>
                                                    <h4 class="mt-3 mb-4 bold"> <span class="mt-5">&#x20B9;</span> '.$trrow["ord_totlprice"].'<span
                                                            class="small text-muted"> via (<span class="text-primary" style="font-weight:bold; font-size:1rem;">'.$trrow["selpaymode"].'</span>)</span></h4>
                                                    <p class="text-muted">Order Status on: <span class="Today">'.date("h:i a").'</span></p>
                                                </div>
                                                <img class="align-self-center img-fluid" src="/images/ordercnf.jpg"
                                                width="110 " height="110">
                                            </div>
                                        </div>
                                        <div class="row px-0 px-md-3">
                                            <div class="col ">
                                                <div class="card-body">';
                                                if($trrow["ord_status"] == 0){
                                                    echo '
                                                    <div class="steps d-flex flex-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-hourglass"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Proccessing</h4>
                                                        </div>
                                                        <div class="step ">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-safe" style="transform: rotate(270deg);"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Cooking</h4>
                                                        </div>
                                                        <div class="step ">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="fas fa-motorcycle"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Out For Delivery</h4>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                elseif($trrow["ord_status"] == 1){
                                                    echo '
                                                    <div
                                                        class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-hourglass"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Proccessing</h4>
                                                        </div>
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-safe" style="transform: rotate(270deg);"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Cooking</h4>
                                                        </div>
                                                        <div class="step">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="fas fa-motorcycle"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Out For Delivery</h4>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                elseif($trrow["ord_status"] == 2){
                                                    echo '
                                                    <div
                                                        class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-hourglass"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Proccessing</h4>
                                                        </div>
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="pe-7s-safe" style="transform: rotate(270deg);"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Cooking</h4>
                                                        </div>
                                                        <div class="step completed">
                                                            <div class="step-icon-wrap">
                                                                <div class="step-icon"><i class="fas fa-motorcycle"></i></div>
                                                            </div>
                                                            <h4 class="step-title">Out For Delivery</h4>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                    
                                    echo '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end -->
                                   ';
                               }

                            }
                            else
                            {
                                echo '
                                <div class="text-center p-3">
                                    <p>No Recent Orders.</p>
                                    <a href="menu.php">Order Now</a>
                                </div>';
                            }

                            ?>

                        </div>
                        <!-- track order end -->

                        <!-- all orders -->
                        <div class="tab-pane fade shadow rounded bg-white p-2 p-md-5" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <h4 class="mb-4"><i class="fa fa-history mr-2"></i>History</h4>

                            <!-- order history -->
                            <div class="table-responsive">
                                <table class="table ordertable" width="100%" cellspacing="0" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Order Date</th>
                                            <th>Order Total</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                            <th>info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                 $ordsql = "SELECT * FROM `allorders_tb` WHERE ord_acid = '{$_SESSION["userid"]}' order by `ord_id` DESC";
                                 $orddata = $conn->query($ordsql);

                                 while($ordrow = $orddata->fetch_assoc())
                                 {
                                     $date = strtotime($ordrow["ord_date"]);
                                     $formdate = date("d-M-Y",$date);


                                    //  if loop for order status

                                    if($ordrow["ord_status"]==0)
                                    {
                                        $color = "warning";
                                        $status = "Processing";
                                    }
                                    elseif ($ordrow["ord_status"] == 1)
                                    {
                                        $color = "primary";
                                        $status = "Accepted";
                                    }
                                    elseif ($ordrow["ord_status"] == 2)
                                    {
                                        $color = "info";
                                        $status = "Out For Delivery";
                                    }
                                    elseif ($ordrow["ord_status"] == 3)
                                    {
                                        $color = "success";
                                        $status = "Delivered";
                                    }
                                    elseif ($ordrow["ord_status"] == 4)
                                    {
                                        $color = "danger";
                                        $status = "Rejected";
                                    }
                                    elseif ($ordrow["ord_status"] == 5)
                                    {
                                        $color = "danger";
                                        $status = "Undelivered";
                                    }

                                    echo 
                                    '
                                    <tr>
                                        <td class="ordnum">'.$ordrow["invid"].'</td>
                                        <td>'.$formdate.'</td>
                                        <td style="font-family:roboto;">₹ '.$ordrow["ord_totlprice"].'</td>
                                        <td>
                                            <span class="badge badge-primary align-center px-2 py-1">'.$ordrow["selpaymode"].'</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-'.$color.'" style="text-align:right !important;">'.$status.'</span>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-success" id="orderdetails" data-toggle="modal" data-target="#exampleModal">View Details</button>
                                        </td>
                                    </tr>
                                    ';
                                 }
                                ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- end -->

                            <!-- order details modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="orddet">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="billing.php" method="POST" target="_blank">
                                                <input type="hidden" id="billorderid" name="invoiceid">
                                                <button class="btn btn-danger" type="submit" name="invoicebtn">
                                                    <i class="fas fa-file-invoice"></i> Invoice
                                                </button>
                                                <!-- <input type="submit" class="btn btn-danger" name="invoicebtn" value="INVOICE"> -->
                                            </form>
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- order details modal END -->
                        </div>
                        <!-- all orders end -->

                        <!-- user profile -->
                        <div class="tab-pane fade shadow rounded bg-white p-4 p-md-5" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <h4 class="mb-4"> <i class="fa fa-user-circle mr-2"></i> Profile Details</h4>

                            <!-- profile table -->
                            <?php
                            
                            ?>
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-borderless profiletable">
                                        <tr>
                                            <th><i class="fa fa-user" aria-hidden="true"></i> UserName</th>
                                            <td><?php echo $profrow["uname"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-location-arrow"></i> Name</th>
                                            <td><?php echo $profrow["Fname"]."  ".$profrow["Lname"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-phone" aria-hidden="true"></i> Mobile</th>
                                            <td><?php echo $profrow["uphone"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-envelope-open" aria-hidden="true"></i> Email</th>
                                            <td><?php echo $profrow["umail"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-home" aria-hidden="true"></i> Address</th>
                                            <td><?php echo $profrow["uadd"]; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>

                            <!-- end -->
                        </div>
                        <!-- profile end -->

                        <!-- settings update profile -->
                        <div class="tab-pane fade shadow rounded bg-white p-2 p-md-5" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <h4 class="c mb-4"><i class="fa fa-cog mr-2"></i> Settings</h4>

                            <!-- form -->
                            <div class="row">
                                <div class="col-12 col-md-6 align-center">
                                    <div class="py-2">
                                        <form action="" method="POST">
                                            <div class="row mt-2">
                                                <div class="col-md-6"><label class="labels">First Name</label>
                                                    <input type="text" class="form-control" name="ufname"
                                                        placeholder="Enter First Name"
                                                        value="<?php echo $profrow["Fname"]; ?>">
                                                </div>
                                                <div class="col-md-6"><label class="labels">Last Name</label>
                                                    <input type="text" class="form-control" name="ulname"
                                                        placeholder="Enter Last Name"
                                                        value="<?php echo $profrow["Lname"]; ?>">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels">PhoneNumber</label>
                                                    <input type="number" class="form-control" name="uphn"
                                                        placeholder="Phone Number"
                                                        value="<?php echo $profrow["uphone"]; ?>">
                                                </div>

                                                <div class="col-md-12 pt-2"><label class="labels">Address</label>
                                                    <textarea type="text" rows="3" class="form-control"
                                                        name="uaddr"><?php echo $profrow["uadd"]; ?></textarea>
                                                </div>

                                            </div>
                                            <div class="mt-5 text-center">
                                                <button class="btn btn-primary profile-button" name="uupdate"
                                                    type="submit">Update
                                                    Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- password reset -->
                                <div class="col-12 col-md-6 align-center">
                                    <div class="py-2">
                                        <form action="" method="POST" class="form-group">

                                            <div class="row pt-2" id="updatepassword">
                                                <div class="col-md-12"><label class="labels">Current Password</label>
                                                    <input type="password" class="form-control" name="oldpass"
                                                        id="oldpass" placeholder="Enter Current Password" required>
                                                </div>

                                                <div class="col-md-12 mt-2"><label class="labels">New Password</label>
                                                    <input type="password" class="form-control" name="newpass"
                                                        id="newpass" placeholder="Enter New Password" required>
                                                </div>
                                            </div>
                                            <div class="form-check mt-3">

                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="viewpassbox">
                                                <label class="form-check-label" for="viewpassbox">
                                                    View Passwprd
                                                </label>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <button class="btn btn-primary profile-button" name="uppass"
                                                    type="submit">Update Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end reset -->
                            </div>
                            <!-- end form -->
                        </div>
                        <!-- settings end -->







                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end new update -->

    <!-- end contant -->
    <!-- footer common with common scripts -->
    <?php 
include('include/footer.php');
include('include/cmonscripts.php');

?>
    <script>
        // password check
        $(document).ready(function () {
            $("#viewpassbox").on('click', function (event) {
                // event.preventDefault();
                if ($('#updatepassword input').attr("type") == "text") {
                    $("#oldpass").attr('type', 'password');
                    $("#newpass").attr('type', 'password');
                } else if ($('#updatepassword input').attr("type") == "password") {
                    $("#oldpass").attr('type', 'text');
                    $("#newpass").attr('type', 'text');
                }
            });
        });

        // load order
        $(document).ready(function () {

            $('#datatablesSimple').on('click', '#orderdetails', function (e) {
                e.preventDefault();

                var ordno = $(this).closest("tr").find(".ordnum").text();
                $('#billorderid').val(ordno);

                $.ajax({
                    type: 'POST',
                    url: '/orderac.php',
                    data: {
                        'chek_viewBtn': true,
                        'ord_ifBtn': ordno,
                    },
                    success: function (response) {
                        $('.orddet').html(response);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#datatablesSimple').DataTable({
                "ordering": false,
            });
        });
    </script>

</body>

</html>