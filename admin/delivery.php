<?php 
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');

if(isset($_REQUEST["asigndelivery"])){
    $ordNo = $_REQUEST["id"];
    // copy order to delivery table
    $sql = "SELECT * FROM `orders_all` where `ord_id` = $ordNo";
    $conn->query($sql);

}

// set out for del
if(isset($_REQUEST["assigndel"])){

    $ordNo = $_REQUEST["ordno"];
    $delname = $_REQUEST["delper"];

    // set rider status
    $update2  = "UPDATE `staff_tb` SET `del_status`= '1' WHERE `staff_name`= '{$delname}'";
    $conn->query($update2);
    // echo $update2;
    // die();

    // get rider details
    $sql = "SELECT * FROM `staff_tb` WHERE `occupation` = 'Delivery' And `staff_name` = '{$delname}'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();

    $update  = "UPDATE `orders_all` SET `ord_status`= '2', `del_per`='{$delname}',`del_phone`='{$row['staff_number']}' WHERE `ord_id`='{$ordNo}'";
    $conn->query($update);
    

    echo '<script>
    swal({
        title: "Rider Assigned",
        icon: "success",
        button: "close",
        type: "success"
    });
    </script>';
    echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';
                            

   
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Delivery</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <!-- assign rider -->
            <div class=" card rounded shadow mb-4 p-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Order No</label>
                        <input type="number" name="ordno" class="form-control" value="<?php echo $ordNo; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Delivery Id</label>
                        <select type="text" name="delper" class="form-control" required="required">
                            <?php
                             $sql = "SELECT * FROM `staff_tb` WHERE `occupation` = 'Delivery' AND `del_status` = 0";
                             $data = $conn->query($sql);
                             while($row = $data->fetch_assoc()){
                                 echo '<option class="text-success">'.$row["staff_name"].'</option>';
                             }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="assigndel" class="btn btn-primary" value="Assign Delivery">
                </form>
            </div>
            <!-- del table-->
            <!-- table -->
            <p class="text-dark card shadow p-2 font-weight-bold">Out For Delivery</p>

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Order id</th>
                            <th>Order details</th>
                            <th>Total</th>
                            <th>Delivery Person</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `orders_all` WHERE `ord_status` = 2";
                        $data = $conn->query($sql);
                        while($row = $data->fetch_assoc()){
                            echo '
                            <form action="" method="post" class="d-inline">
                            <tr>
                                <td class="delordid">'.$row["ord_id"].'</td>
                                <td>
										<button type="button" class="btn btn-info mr-3 orddet"  data-toggle="modal" data-target="#viewdetails">
										<i class="fas fa-eye"></i>
										</button>
                                </td>
                                <td>'.$row["ord_totlprice"].'</td>
                                
                                <td><input type="hidden" name="delper" value='.$row["del_phone"].'>'.$row["del_per"].'</td>
                                <td>'.$row["del_phone"].'</td>';
                                if($row["del_status"] == 0){
                                    echo '<td class="text-success">Out For Delivery</td>';
                                }
                                if($row["del_status"] == 0){
                                    echo '<td>
                                    <input type="hidden" name="id" value='.$row["ord_id"].'>
                                    <button class="btn btn-success" type="submit" name="cnfdel">
                                    <i class="fas fa-clipboard-check "></i> Confirm delivery
                                    </button>
                                
                                </td>';
                                }
                            echo '</tr>
                            </form>';
                            
                            // cnf delivery
                            if(isset($_REQUEST["cnfdel"])){
                                $ordid = $_REQUEST["id"];
                                $delname = $_REQUEST["delper"];
                                
                               

                                // free rider
                                $update  = "UPDATE `staff_tb` SET `del_status`= '0' WHERE `staff_number`= '{$delname}'";
                                $conn->query($update);

                                $sql = "UPDATE `orders_all` SET `ord_status` = '3' WHERE `ord_id` = '{$ordid}'";
                                $conn->query($sql);
                                echo '<script>
                                swal({
                                    title: "Delivered",
                                    icon: "success",
                                    button: "close",
                                    type: "success"
                                });
                                </script>';
                                echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';
                            }
                            
                        }
                        
                      
                        ?>
                    </tbody>
                </table>
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
                                    <p class="text-dark font-weight-bold delname"></p>
                                    <p class="text-dark font-weight-bold deladd"></p>
                                    <p class="text-dark font-weight-bold deltotal"></p>
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
                                        <tbody class="orditmview">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end modal -->
            </div>
            <!-- table -->
            <p class="text-dark card shadow p-2 font-weight-bold">Available Delivery Boy</p>

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `staff_tb` WHERE `occupation` = 'Delivery'";
                        $data = $conn->query($sql);
                        while($row = $data->fetch_assoc()){
                            echo '
                            <tr>
                                <td class="admid">'.$row["staff_id"].'</td>
                                <td>'.$row["staff_name"].'</td>
                                <td>'.$row["staff_email"].'</td>
                                <td>'.$row["staff_number"].'</td>';
                                if($row["del_status"] == 0){
                                    echo '<td class="text-success">Available</td>';
                                }
                                else
                                if($row["del_status"] == 1){
                                    echo '<td class="text-danger">Assigned</td>';
                                }
                            echo '</tr>';
                            
                        }
                        
                      
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>