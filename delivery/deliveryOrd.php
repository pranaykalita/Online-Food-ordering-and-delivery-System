<?php include("./common/header.php");

// set delevered
$deliveryid = $_SESSION["deliveryid"];
$curenttime = date("h:i:sa");
if(isset($_POST["delivered"]))
{
    $invoice = $_POST["invoice"];
    $dpmode = $_POST["paymode"];

    // update delivery set to 3 delivered
    $query = "UPDATE `allorders_tb` SET `delpaymethod` = '$dpmode' , `ord_status` = '3' , `del_per` = '$deliveryid' , `del_time`= '$curenttime' WHERE `invid` = '{$invoice}'";
    $result = $conn->query($query);

    // free Rider status
    $delquery = "UPDATE `delivery_tb` SET `del_status`= '0' WHERE `id`= '$deliveryid'";
    $result2 = $conn->query($delquery);

    
    
    echo '<script>
    swal({
        title: "Ordered Delivered",
        text: "Invoice Number: '.$invoice.'",
        icon: "success",
        button: "OK",
        type: "success"
    }).then(function() {
        window.location = "records.php";
    });
    </script>';
}

// set undelivered or Rejected
if(isset($_POST["undelivered"]))
{
    $invoice = $_POST["invoice"];

    // update delivery set to 5
    $query = "UPDATE `allorders_tb` SET `ord_status` = '5' , `del_per` = '$deliveryid' ,`del_time` = '$curenttime' WHERE `invid` = '{$invoice}'";
    $result = $conn->query($query);


    // free Rider status
    $delquery = "UPDATE `delivery_tb` SET `del_status`= '0' WHERE `id`= '$deliveryid'";
    $result2 = $conn->query($delquery);

    echo '<script>
    swal({
        title: "Ordered Undelivered",
        text: "Invoice Number: '.$invoice.'",
        icon: "success",
        button: "OK",
        type: "success"
    }).then(function() {
        window.location = "records.php";
    });
    </script>';

}

?>
<style>
    .selectmode{
        width: 20%;
        height: 20%;
        border: 1px solid #82a3ff;
        border-radius: 7px;
        box-shadow: 6px 11px 20px 0px rgba(0,0,0,0.2);
        
    }
    
</style>
<div id="layoutSidenav_content">
    <?php
    $deliveryid = $_SESSION["deliveryid"];
    // load details
    $query = "SELECT * FROM `allorders_tb` WHERE `del_per` = '$deliveryid' AND `ord_status` = 2";
    $data = $conn->query($query);
    $row = $data->fetch_assoc();

    $date = strtotime($row["ord_date"]);
    $time = strtotime($row["ord_time"]);
    
    $orddate = date("d-M-Y",$date);
    $ordtime = date("h:sa",$time);

    if(mysqli_num_rows($data) > 0 )
    {
        ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Active Delivery</h1>
            <form method="POST" action="" class="form-group">
                <div class="row">
                    <div class="col text-center p-3">
                        <p class="text-dark" id="topclock"></p>   
                        <form action="" method="POST">
                            <label for=""> Payment Mode</label>
                            <!-- <br> -->
                            <select class="text-center mt-3 mb-5 selectmode" name="paymode" id="paymode">
                           
                                 <option value="cash" id="cashsel">Cash payment</option>
                                 <option value="Upi" id="upisel">Upi payment</option>
                                 <option value="Card" id="cardsel">card payment</option>
                            </select>

                            <br>
                            <input type="hidden" name="invoice" value="<?php echo $row["invid"];?>">
                            <input type="submit" class="btn btn-success" name="delivered" value="Delivered">
                            <input type="submit" class="btn btn-danger" name="undelivered" value="Undelivered">
                        </form>
                </div>
            </form>
            <!-- record start -->
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Details
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-danger" style="font-weight: bold; font-size:1.2em;">
                            <?php
                            if($row["selpaymode"] == "cash")
                            {
                            echo '<img src="/images/cod.png" style="width: 150px; height:150px; object-fit:contain;" alt="">';
                            }
                            elseif($row["selpaymode"] == "Upi")
                            {
                            echo '<img src="/images/gpay.png" style="width: 150px; height:150px; object-fit:contain;" alt="">';
                            }
                            elseif($row["selpaymode"] == "Card")
                            {
                            echo '<img src="/images/paid.png" style="width: 150px; height:150px; object-fit:contain;" alt="">';
                            }
                            ?>
                           
                        </td>
                        </tr>
                        <tr>
                            <th>Order Number</th>
                            <td class="invid text-success"><?php echo $row["invid"];?></td>
                        </tr>
                        <tr>
                            <th>Date & Time</th>
                            <td><?php echo $orddate; ?> <span class="text-success"><?php echo $ordtime;?></span></td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td><?php echo $row["ord_phone"];?></td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td><?php echo $row["ord_user"];?></td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td><?php echo $row["ord_addrs"];?></td>
                        </tr>
                        <tr>
                            <th>Landmark</th>
                            <td><?php echo $row["ord_lmark"];?></td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>₹ <?php echo $row["ord_totlprice"];?></td>
                        </tr>
                       
                    </table>
                </div>

                <div class="card-body">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Ordered Items
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Items</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="ordtable">

                        </tbody>

                    </table>
                </div>
            </div>
            <!-- record end -->
<!-- Modal -->
<div class="modal fade" id="upiscan" tabindex="-1" role="dialog" aria-labelledby="upiscanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="upiscan">Scan To pay</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="/images/upi.jpeg" alt="" style="width:100%; height:100%">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Payment Done</button>
      </div>
    </div>
  </div>
</div>
    <!-- end -->
        </div>
    </main>
    <?php

    }
    else
    {
?>
    <main>
        <div class="container-fluid px-4 d-flex align-center justify-content-center">
            <h4 class="mt-4 text-danger">No New Delivery</h4>
        </div>
    </main>
    <?php
    }

    ?>

    <?php include("./common/footer.php");