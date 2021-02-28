<?php 
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');

if(isset($_REQUEST["asigndelivery"])){
    $ordNo = $_REQUEST["id"];
    // copy order to delivery table
    $sql = "SELECT * FROM `allorders_tb` where `ord_id` = $ordNo";
    $conn->query($sql);

}

// set out for del
if(isset($_REQUEST["assigndel"])){

    $ordNo = $_REQUEST["ordno"];
    $delname = $_REQUEST["delper"];

    // set rider status
    $update2  = "UPDATE `delivery_tb` SET `del_status`= '1' WHERE `del_name`= '{$delname}'";
    $conn->query($update2);

    // get rider details
    $sql = "SELECT * FROM `delivery_tb` WHERE `del_name` = '{$delname}'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    // update to orders
    $update  = "UPDATE `allorders_tb` SET `ord_status`= '2', `del_per`='{$delname}',`del_phone`='{$row['del_phone']}' WHERE `ord_id`='{$ordNo}'";
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
                        <input type="number" name="ordno" class="form-control" value="<?php echo $ordNo; ?>" readonly  required="required">
                    </div>
                    <div class="form-group">
                        <label for="name">Delivery By</label>
                        <select type="text" name="delper" class="form-control" required="required">
                            <?php
                             $sql = "SELECT * FROM `delivery_tb` WHERE `del_status` = 0";
                             $data = $conn->query($sql);
                             while($row = $data->fetch_assoc()){
                                 echo '<option class="text-success">'.$row["del_name"].'</option>';
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
                        $sql = "SELECT * FROM `allorders_tb` WHERE `ord_status` = 2";
                        $data = $conn->query($sql);
                        while($row = $data->fetch_assoc()){
                            echo '
                            <form action="" method="post" class="d-inline">
                            <tr>
                                <td class="delordid">'.$row["ord_id"].'</td>
                                <td>
										<button type="button" class="btn btn-info mr-3 orddet"  data-toggle="modal" data-target="#viewdetails">
										<i class="fas fa-eye"></i>
                                        View Order Details
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
                                $update  = "UPDATE `delivery_tb` SET `del_status`= '0' WHERE `del_phone`= '{$delname}'";
                                $conn->query($update);

                                $sql = "UPDATE `allorders_tb` SET `ord_status` = '3' WHERE `ord_id` = '{$ordid}'";
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
            <p class="text-dark card shadow py-2 my-3 font-weight-bold">Available Delivery Boy</p>
            <button href="#" type="button" data-toggle="modal" data-target="#adddel" class="btn btn-success my-3">
                <i class="fas fa-plus"></i> Add Delevery
            </button>
            <!-- modal add del -->
            <?php
			if(isset($_REQUEST["adddel"]))
			{
				
				$name =$_REQUEST["name"];
				$phone =$_REQUEST["phone"];
				
				$sql = "INSERT INTO `delivery_tb`(`del_name`, `del_phone`) 
				VALUES ('$name','$phone')";
				$conn->query($sql);
				echo '<script>
				swal({
					title: "New Delivery Added",
					icon: "success",
					button: "close",
					type: "success"
				});</script>';
				echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';
			}
			?>
            <div class="modal fade" id="adddel" tabindex="-1" role="dialog" aria-labelledby="adddel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adddel">
                                Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" maxlength="13" class="form-control"
                                        pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                        placeholder="Enter Phone(+911234567890)">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="adddel" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // free rider (safekey )
                        if(isset($_REQUEST["freerider"]))
			            {
                            $id = $_POST["id"];

                            $sq = "UPDATE `delivery_tb` SET `del_status`= '0' WHERE `id`= '{$id}'";
                            $conn->query($sq);
                            echo '<meta http-equiv="refresh" content= "1;URL=" />';

                        }


                        $sql = "SELECT * FROM `delivery_tb`";
                        $data = $conn->query($sql);
                        while($row = $data->fetch_assoc()){
                            echo '
                            <tr>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["del_name"].'</td>
                                <td>'.$row["del_phone"].'</td>';
                            if($row["del_status"] == 0)
                            {
                                echo '<td class="text-success">Available</td>';
                            }else
                            if($row["del_status"] == 1)
                            {
                                echo '<td class="text-danger">On delivery

                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["id"].'>
                                    <button class="btn btn-info" type="submit" name="freerider">
                                    <i class="fas fa-times "></i> Free Rider
                                    </button>
                                </form>
                                </td>
                                ';
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