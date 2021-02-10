<?php
error_reporting(0);
define("TITLE" , "Coders Cafe | payment");
include('include/dbcon.php');
include('include/head.php');
date_default_timezone_set("Asia/kolkata");
$date = date("Y/m/d");
$time = date("h:i a");

if(!isset($_SESSION["username"]))
{
	header("LOCATION: /login.php");
}
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/payment.css" />

</head>

<body>

    <?php include('include/header.php'); ?>
    <!-- content -->
    <?php 
    if(isset($_REQUEST["cnforder"])){
        
        if(empty($_SESSION['cart']))
        {
            echo '<script>
            swal({
                title: "Cart Empty",
                text: "Add item to cart",
                icon: "error",
                button: "Add Item",
                type: "error"
            }).then(function() {
                window.location = "menu.php";
            });
            </script>';
        
        }
        else
        {
            $umail = $_REQUEST["usermail"];
            $uname = $_REQUEST["username"];
            $name = $_REQUEST["bname"];
            $phone = $_REQUEST["bphn"];
            $addrs = $_REQUEST["badd"];
            $landmrk = $_REQUEST["bland"];
            $items = $_SESSION["cart"];
            foreach($_SESSION['cart'] as $key => $value)
            {
                $stotal = $value["Item_price"]*$value["quantity"];
                $total = $total + $stotal;
            }
            $serializeItm = serialize($items);

            $sql = "INSERT INTO `orders_all`(`ord_items`, `ord_totlprice`, `ord_uname`, `ord_user`, `ord_phone`, `ord_email`, `ord_addrs`, `ord_lmark`, `ord_date`, `ord_time`, `ord_status`) 
                    VALUES ('$serializeItm' , '$total' , '$name' ,'$uname' ,'$phone' ,'$umail' ,'$addrs' ,'$landmrk' ,'$date' ,'$time' ,'0')";
            $conn->query($sql);
            unset($_SESSION["cart"]);
            echo '<script>
            swal({
                title: "Order Placed",
                text: "Order Placed",
                icon: "success",
                button: "check order",
                type: "success"
            }).then(function() {
                window.location = "account.php";
            });
            </script>';
            
        }
    }

    ?>
    <!-- home -->
    <section id="payment">
        <div class="container-fluid">
            <div class="row cardpay">
                <div class="col-md-11 col-11 mx-auto ">
                    <div class="row mt-5 ">
                        <!-- card -->
                        <div class="col-md-12 col-lg-11 col-11 mx-auto mb-lg-0 mb-5">
                            <div class="card p-3 my-4 shadow">
                                <div class="row">
                                    <div class="col">
                                        <h3><i class="fas fa-wallet"></i> payments</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- side left -->
                                    <div class="col-md-5">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <input type="text" class="form-control name" name="username"
                                                    value="<?php echo $_SESSION["username"]; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control name" name="usermail"
                                                    value="<?php echo  $_SESSION["useremail"]; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control name" name="bname"
                                                    placeholder="Your Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control name" name="bphn"
                                                    placeholder="phone (e.g. +91155552675)"
                                                    pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" rows="3" class="form-control name" name="badd"
                                                    placeholder="Address,house no" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control name" name="bland"
                                                    placeholder="landmark">
                                            </div>
                                            <div class="form-group">
                                                <p class="mode">payment Mode: <span class="text-danger">Cash</span></p>
                                            </div>
                                            <div class="form-group text-center">
                                                <input class="btn btn-primary submit-btn px-4" name="cnforder"
                                                    type="submit" onclick="sucess()" value="Order">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- side right -->
                                    <div class="col-md-7">
                                        <div class="card shadow rounded-lg p-2">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Item</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Quantity</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Price</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                              $stotal = 0;
                                                              $total = 0;
                                                                if(isset($_SESSION['cart']))
                                                                {
                                                                    foreach($_SESSION['cart'] as $key => $value)
                                                                    {
                                                                        $stotal = $value["Item_price"]*$value["quantity"];
                                                                        $total = $total + $stotal;
                                                                        echo '
                                                                        <tr>
                                                                            <td>'.$value["Item_name"].'</td>
                                                                            <td>'.$value["quantity"].'</td>
                                                                            <td>'.$value["Item_price"].'</td>
                                                                            <td>'.$stotal.'</td>
                                                                        </tr>';
                                                                    }
                                                                }
                                                                ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="py-3 px-5 text-right">
                                                <div class="mb-2 font-weight-bold">Total amount</div>
                                                <div class="h3 font-weight-light">₹ <?php echo $total; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contant -->

    <!-- footer common with common scripts -->
    <?php 
    include('include/footer.php');
    include('include/cmonscripts.php');
    ?>
    <script>
        $(document).ready(function () {
            swal({
                    title: "Are you sure to continue?",
                    text: "Once the order is placed it cannot be cancelled ",
                    icon: "warning",
                    buttons: ["No!", "Place order!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) {
                        window.location.href = "/";
                    }
                });

        });
    </script>
</body>

</html>