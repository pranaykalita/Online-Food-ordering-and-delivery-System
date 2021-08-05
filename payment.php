<?php
error_reporting(0);
define("TITLE" , "FOODZILLA | payment");
include('include/dbcon.php');
include('include/head.php');
date_default_timezone_set("Asia/kolkata");
$date = date("Y/m/d");
$time = date("h:i a");
if(!isset($_SESSION["username"]))
{
	header("LOCATION: /login.php");
}

// get users details
$sql = "SELECT * FROM `users_tb` WHERE `uid` = '{$_SESSION["userid"]}'";
$data=  $conn->query($sql);
$userr = $data->fetch_assoc();
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
            //  genrate a invoice id
            $query = "SELECT `invid` from `allorders_tb`  ORDER BY `ord_id` DESC";
            $res = $conn->query($query);

            $rw = $res->fetch_array();

            // sget data
            $uname = $_REQUEST["username"];
            $umail = $_REQUEST["usermail"];
            $acid = $_SESSION["userid"];

            $phone = $_REQUEST["bphn"];
            $addrs = $_REQUEST["badd"];
            $landmrk = $_REQUEST["bland"];
            $items = $_SESSION["cart"];

            // get payment mode

            $spmode = $_REQUEST["paymode"];


            // invoice
            $lastid = $rw["invid"];
            

            if(empty($lastid))
            {
                $number = "invoice-00001";
            }
            else
            {
                $idd = str_replace("invoice-","",$lastid);
                $invid = str_pad($idd + 1 , 4 ,0, STR_PAD_LEFT);
                $number = 'invoice-' . $invid;
            }
           

            foreach($_SESSION['cart'] as $key => $value)
            {
                $stotal = $value["Item_price"]*$value["quantity"];
                $total = $total + $stotal;
            }
            $serializeItm = serialize($items);

            $sql = "INSERT INTO `allorders_tb`(`invid` , `ord_items`, `ord_totlprice`,`ord_acid`, `ord_user`, `ord_phone`, `ord_email`, `ord_addrs`, `ord_lmark`, `ord_date`, `ord_time`, `ord_status`,`selpaymode`) 
                    VALUES ('$number','$serializeItm' , '$total' ,'$acid','$uname' ,'$phone' ,'$umail' ,'$addrs' ,'$landmrk' ,'$date' ,'$time' ,'0','$spmode')";
           
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
                <div class="col-md-11 col-12 mx-md-auto ">
                    <div class="row mt-5 ">
                        <!-- card -->
                        <div class="col-md-12 col-lg-11 col-12 mb-lg-0 mb-5">
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
                                                    value="<?php echo $userr["Fname"] ." ". $userr["Lname"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control name" name="usermail"
                                                    value="<?php echo  $_SESSION["useremail"]; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control name" name="bphn"
                                                    placeholder="phone (e.g. +91155552675)"
                                                    value="<?php echo $userr["uphone"]; ?>"
                                                    pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" rows="3" class="form-control name" name="badd"
                                                    placeholder="Delivery Address,house no"
                                                    required><?php echo $userr["uadd"]; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control name" name="bland"
                                                    placeholder="landmark">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">payment Mode</label>
                                                <select class="form-control" name="paymode" id="paymode">
                                                    <option value="cash" id="cashsel">Cash</option>
                                                    <option value="Upi" id="upisel">Online- GPAY/UPI QR</option>
                                                    <option value="Card" id="cardsel">CARD</option>
                                                </select>

                                                <p class="text-danger pt-3"><input type="checkbox" required> Once the
                                                    order is placed it cannot be cancelled</p>
                                            </div>
                                            <div class="form-group text-center">
                                                <input class="btn btn-primary submit-btn px-4" name="cnforder"
                                                    id="orderbtn" type="submit" value="Order">

                                                <a href="/" class="btn btn-success submit-btn px-4 text-white">Go
                                                    Back</a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- side right -->
                                    <div class="col-md-7">
                                        <div class="card shadow rounded-lg p-2">
                                            <div class="col-md-12 table-responsive">
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
                                                <div class="h3 font-weight-light" id="totalcart">₹ <?php echo $total; ?></div>
                                            </div>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <img class="d-inline" src="images/gpay.png" alt=""
                                                style="height: 55px; width:140px;">
                                            <img class="pl-3 d-inline"" src=" images/cod.png" alt=""
                                                style="height: 150px; width:180px;">
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

    <!-- Modal -->
    <div class="modal fade" id="upiscan" tabindex="-1" role="dialog" aria-labelledby="upiscanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="upiscan">Scan To pay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>After Successfull Payment please Show Upi Transection at time of Delivery</p>
                    <img src="images/upi.jpeg" alt="" style="width:100%; height:100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- card payment modal -->
    <div class="modal fade" id="cardscan" tabindex="-1" role="dialog" aria-labelledby="cardscanlabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardscan">Scan To pay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>CART TOTAL: <span id="carttotl"></span></h5>
                    <style>
                        .cardrounded {
                            border-radius: 1rem !important;
                        }

                        .cardshadow {
                            box-shadow: -1px 7px 41px 0px rgba(0, 0, 0, 0.5) !important;
                        }
                    </style>
                    <!-- card -->
                    <div class="card cardrounded cardshadow p-3">

                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> 
                                        <input type="text" name="username" placeholder="Card Owner Name" id="cardholder"
                                            required class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="cardNumber" id="cardnumber" pattern="/^-?\d+\.?\d*$/"
                                                        onKeyPress="if(this.value.length==16) return false;"
                                                placeholder="Valid card number" class="form-control " required>
                                            <div class="input-group-append"> 
                                                <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa mx-1"></i> <i
                                                        class="fab fa-cc-mastercard mx-1"></i> <i
                                                        class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group">
                                                    <input type="number" placeholder="MM" pattern="/^-?\d+\.?\d*$/" id="cmonth"
                                                        onKeyPress="if(this.value.length==2) return false;" name=""
                                                        class="form-control" required>
                                                    <input type="number" placeholder="YY" pattern="/^-?\d+\.?\d*$/" id="cyear"
                                                        onKeyPress="if(this.value.length==2) return false;" name=""
                                                        class="form-control" required> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                    title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> 
                                                <input type="text" required class="form-control" id="cvv"
                                                    pattern="/^-?\d+\.?\d*$/"
                                                    onKeyPress="if(this.value.length==3) return false;"> </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="cardcnforder" disabled>PAY NOW</button>
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- card END -->
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <!-- footer common with common scripts -->
    <?php 
    include('include/footer.php');
    include('include/cmonscripts.php');
    ?>

</body>

</html>