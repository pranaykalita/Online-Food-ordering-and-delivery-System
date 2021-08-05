<?php 
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">manage recent Orders</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Order</h6>
        </div>

        <div class="card-body">
            <!-- add content here  -->
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <th>Order NO</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>status</th>
                        <th>details</th>
                        <th>action</th>
                        <th style="display: none;"></th>
                    </thead>
                    <tbody>
                        <?php
                                 // approve order
                                 if(isset($_REQUEST["approve"]))
                                 {
                                     $ordid = $_REQUEST["id"];
 
                                     $sql = "UPDATE `allorders_tb` SET `ord_status`= '1' WHERE `ord_id` = '{$ordid}'";
                                     $conn->query($sql);
                                     echo '<script>
                                     swal({
                                         title: "Order Accepted",
                                         icon: "success",
                                         button: "close",
                                         type: "success"
                                     });
                                     </script>';
                                 }
                                   // Reject order
                                   if(isset($_REQUEST["reject"]))
                                   {
                                       $id = $_REQUEST["id"];
   
                                       $sql = "UPDATE `allorders_tb` SET `ord_status`= '4' WHERE `ord_id` = '{$id}'";
                                       $conn->query($sql);
                                       echo '<script>
                                       swal({
                                           title: "Order Rejected",
                                           icon: "error",
                                           button: "close",
                                           type: "error"
                                       });
                                       </script>';
                                   }
                                
                                $sql = "SELECT * FROM `allorders_tb` WHERE `ord_status` = '0' or `ord_status` = '1' ORDER BY `invid` DESC";
                                $data = $conn->query($sql);
                                while($row = $data->fetch_assoc()){

                                    $ord_date = strtotime($row["ord_date"]);
                                    $ford_date = date("d-M-Y",$ord_date);

                                    echo '
                                    <tr>
                                    <td class="ord_id" style="display: none;"  >'.$row["ord_id"].'</td>
                                    <td>'.$row["invid"].'</td>
                                    <td>'.$row["ord_user"].'</td>
                                    <td>₹ '.$row["ord_totlprice"].'</td>
                                    <td>'.$ford_date.'</td>';
                                    if($row["ord_status"] == 0)
                                    {
                                        echo '<td class="text-success"><i class="fas fa-check-circle"></i>New Order</td>';
                                    }
                                    elseif($row["ord_status"] == 1)
                                    {
                                        echo '<td class="text-danger"><i class="fas fa-hourglass-half"></i>Cooking</td>';

                                    }
                                    echo '
                                    <td>
										<button type="button" class="btn btn-info mr-3  viewdetails"  data-toggle="modal" data-target="#viewdetails">
										<i class="fas fa-eye"></i> View Order
										</button>
                                    </td>';

                                    if($row["ord_status"] == 1)
                                    {
                                        echo'
                                        <td>
                                            <form action="delivery.php" method="post" class="d-inline">
                                                <input type="hidden" name="id" value='.$row["ord_id"].'>
                                                <input type="hidden" name="invid" value='.$row["invid"].'>
                                                <button class="btn btn-success" type="submit" name="asigndelivery">
                                                <i class="fas fa-clipboard-check "></i> Assign delivery
                                                </button>
                                            </form>
                                        </td>
                                        </tr>';
                                    }
                                    else
                                    {
                                    echo '
                                    <td>
                                    
                                        <form action="" method="post" class="d-inline">
                                            <input type="hidden" name="id" value='.$row["ord_id"].'>
                                            <button class="btn btn-primary" type="submit" name="approve">
                                            <i class="fas fa-hamburger "></i> Approve
                                            </button>
                                         </form>

                                         <form action="" method="post" class="d-inline">
                                            <input type="hidden" name="id" value='.$row["ord_id"].'>
                                            <button class="btn btn-danger" type="submit" name="reject">
                                            <i class="fas fa-ban "></i> Reject
                                            </button>
                                         </form>
                                    </td>
                                    </tr>'; 
                                    }
                                }
                               
                                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- modal section  -->
<!-- modal view details -->
<div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="viewdetails" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewdetails">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row p-2">
                <table class="table table-borderless">
                    <tr>
                        <th>Payment Mode</th>
                        <td class="pmode text-dark font-weight-bold"></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td class="name text-dark font-weight-bold"></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td class="phone text-dark font-weight-bold"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td class="add text-dark font-weight-bold"></td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td class="total text-dark font-weight-bold">₹</td>
                    </tr>
                </table>
            </div>
            <div class="row p-2">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Items</th>
                                <th>Quantity</th>
                                <th>price</th>
                            </tr>
                        </thead>
                        <tbody class="ordview">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- end modal -->
</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>