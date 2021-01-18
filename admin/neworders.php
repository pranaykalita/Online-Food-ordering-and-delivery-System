<?php 
define("TITLE" , "Coders Cafe | ADMIN");
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
            <h6 class="m-0 font-weight-bold text-primary">confirm manage</h6>
        </div>

        <div class="card-body">
            <!-- add content here  -->
            <div class="card-body">
            <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>id</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Details</th>
                    <th>status</th>
                    <th>action</th>
                </thead>
                <tbody>
                    <?php
                                 // approve order
                                 if(isset($_REQUEST["approve"]))
                                 {
                                     $id = $_REQUEST["id"];
 
                                     $sql = "UPDATE `orders_all` SET `ord_status`= '1' WHERE `ord_id` = '{$id}'";
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
                                
                                $sql = "SELECT * FROM `orders_all` WHERE `ord_status` = '0' or `ord_status` = '1' order by `ord_id` desc";
                                $data = $conn->query($sql);
                                while($row = $data->fetch_assoc()){
                                    echo '
                                    <tr>
                                    <td class="ord_id">'.$row["ord_id"].'</td>
                                    <td>'.$row["ord_user"].'</td>
                                    <td>'.$row["ord_totlprice"].'</td>
                                    <td>'.$row["ord_date"].'</td>
                                    <td>
										<button type="button" class="btn btn-info mr-3  viewdetails"  data-toggle="modal" data-target="#viewdetails">
										<i class="fas fa-eye"></i>
										</button>
                                    </td>';
                                    if($row["ord_status"] == 0){
                                        echo '<td class="text-success"><i class="fas fa-check-circle"></i>New Order</td>';

                                    }else
                                    if($row["ord_status"] == 1){
                                        echo '<td class="text-danger"><i class="fas fa-hourglass-half"></i>Cooking</td>';

                                    }

                                    if($row["ord_status"] == 1){
                                        echo'
                                        <td>
                                            <form action="delivery.php" method="post" class="d-inline">
                                                <input type="hidden" name="id" value='.$row["ord_id"].'>
                                                <button class="btn btn-success" type="submit" name="asigndelivery">
                                                <i class="fas fa-clipboard-check "></i> Assign delivery
                                                </button>
                                            </form>
                                        </td>';
                                    }else{

                                    echo '
                                    <td>
                                        <form action="" method="post" class="d-inline">
                                            <input type="hidden" name="id" value='.$row["ord_id"].'>
                                            <button class="btn btn-primary" type="submit" name="approve">
                                            <i class="fas fa-hamburger "></i> Approve
                                            </button>
                                         </form>
                                    </td>'; 
                                    }
                                }
                               
                                ?>
                </tbody>
            </table>
            </div>
            </div>
            <!-- modal section  -->
            <!-- modal view details -->
            <div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="viewdetails"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewdetails">Update category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="row p-2">
                            <div class="col">
                                <p class="text-dark">User:</p>
                                <p class="text-dark">Address:</p>
                                <p class="text-dark">Total:</p>
                                <p class="text-dark">items</p>
                            </div>
                            <div class="col">
                                <p class="text-dark font-weight-bold">nova99</p>
                                <p class="text-dark font-weight-bold">jorhat</p>
                                <p class="text-dark font-weight-bold">5000</p>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>item</th>
                                            <th>qty</th>
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
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>