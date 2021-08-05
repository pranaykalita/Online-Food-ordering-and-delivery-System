<?php include("./common/header.php");

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Deliverys</h1>

            <!-- record start -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Deliverys
                </div>
                <div class="card-body">
                    <table class="table table-striped table-borderless" id="datatablesSimple">
                        <thead class="thead-dark">
                            <tr>
                                <th>Order Number</th>
                                <th>Total </th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Payment</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $deliveryid = $_SESSION["deliveryid"];
                                $query = "SELECT * FROM `allorders_tb` WHERE (`del_per` = '$deliveryid') AND (`ord_status` = 3  OR `ord_status` = 5) ORDER BY `ord_id` DESC ";
                                $data = $conn->query($query);
                                while($row = $data->fetch_assoc())
                                {
                                    $date = strtotime($row["ord_date"]);
                                    $orddate = date("d-M-y",$date);
                                    echo '
                                    <tr>
                                    <td class="Rinvoice">'.$row["invid"].'</td>
                                    <td>₹ '.$row["ord_totlprice"].'</td>
                                    <td>'.$orddate.'</td>
                                    <td>'.$row["ord_addrs"].'</td>
                                    <td>'.$row["delpaymethod"].'</td>';
                                    if($row["ord_status"] == 3)
                                    {
                                        echo '<td class="text-success">Delivered</td>';
                                    }
                                    elseif($row["ord_status"] == 5)
                                    {
                                        echo '<td class="text-danger">Undelivered</td>';
                                    }
                                    echo  '<td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary Rviewdetail" data-bs-toggle="modal" data-bs-target="#viewDetails">
                                    View Details
                                    </button>
                                    </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- record end -->
            <!-- modal start-->
            <div class="modal fade" id="viewDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewDetailsLebel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order Details</h5>
                </div>
                <div class="modal-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td>Items</td>
                               <td>qty</td>
                               <td>Price</td>
                           </tr>
                       </thead>
                       <tbody class="allrecordtable">

                       </tbody>
                   </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            <!-- modal end -->
        </div>
    </main>
    <?php include("./common/footer.php");