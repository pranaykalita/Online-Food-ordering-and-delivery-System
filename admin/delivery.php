<?php 
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');

if(isset($_REQUEST["asigndelivery"])){

    $ordNo = $_REQUEST["id"];
    $ivid = $_POST["invid"];
    
    
    // copy order to delivery table
    $sql = "SELECT * FROM `allorders_tb` where `ord_id` = $ordNo";
    $conn->query($sql);

}

// set out for del
if(isset($_REQUEST["assigndel"])){

    $ordNo = $_REQUEST["ordno"];
    $delid = $_REQUEST["delper"];

    // set rider status
    $update2  = "UPDATE `delivery_tb` SET `del_status`= '1' WHERE `id`= '{$delid}'";
    $conn->query($update2);

    // get rider details
    $sql = "SELECT * FROM `delivery_tb` WHERE `del_name` = '{$delid}'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    
    // update to orders
    $update  = "UPDATE `allorders_tb` SET `ord_status`= '2', `del_per`='{$delid}' WHERE `ord_id`='{$ordNo}'";
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

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Order Number</label>
                    <input type="hidden" name="ordno" value="<?php echo $ordNo; ?>">
                    <input type="text" class="form-control text-success" id="deliveryinv" value="<?php echo $ivid; ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="name">Delivery By</label>
                    <select type="text" name="delper" class="form-control" required="required">
                        <?php
                             $sql = "SELECT * FROM `delivery_tb` WHERE `del_status` = 0";
                             $data = $conn->query($sql);
                             while($row = $data->fetch_assoc()){
                                 echo '<option class="text-success" value="'.$row["id"].'">'.$row["del_name"].'</option>';
                             }
                            ?>
                    </select>
                </div>
                <span id="warning" class="text-danger"></span><br>
                <input type="submit" name="assigndel" id="asigndel" class="btn btn-primary mt-3" value="Assign Delivery">
            </form>
        </div>
    </div>
</div>

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


            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th style="display: none;"></th>
                            <th>Order</th>
                            <th>details</th>
                            <th>Total</th>
                            <th>DeliveryBy</th>
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
                            
                            <tr>
                                <td class="delordid" style="display: none;" >'.$row["ord_id"].'</td>

                                <td >'.$row["invid"].'</td>
                                <td>
								<button type="button" class="btn btn-info mr-3 orddet"  data-toggle="modal" data-target="#viewdetails">
								<i class="fas fa-eye"></i>
                                Order Details
								</button>
                                </td>

                                <td>₹ '.$row["ord_totlprice"].'</td>';
                                
                                
                                $q = "SELECT * FROM `delivery_tb` WHERE `id` = '{$row["del_per"]}'";
                                $c = $conn->query($q);
                                $drow = $c->fetch_assoc();

                                echo '<td>'.$drow["del_name"].'</td>';

                                if($row["ord_status"] == 2){
                                    echo '<td class="text-danger">Out For Delivery</td>';
                                }
                                echo '
                                <td>
                                    <form method="POST" action="">
                                    <input type="hidden" name="id" value='.$row["ord_id"].'>
                                    <input type="hidden" name="deid" value='.$row["del_per"].'>
                                    <button class="btn btn-success" type="submit" name="cnfdel">
                                    <i class="fas fa-clipboard-check "></i> Confirm delivery
                                    </button>
                                    </form>
                                
                                </td>';
                            echo '</tr>';
                            
                            // cnf delivery
                            if(isset($_REQUEST["cnfdel"])){

                                $ordid = $_REQUEST["id"];
                                $delid = $_REQUEST["deid"];
                                $curenttime = date("h:i:sa");
                                
                                // free rider
                                $update  = "UPDATE `delivery_tb` SET `del_status`= '0' WHERE `id`= '{$delid}'";
                                $conn->query($update);

                                // set to delivered
                                $sql = "UPDATE `allorders_tb` SET `ord_status` = '3' ,`del_per` = '$delid' , `del_time`= '$curenttime' WHERE `ord_id` = '{$ordid}'";
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
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Delivery Agent</h1>
    </div>

    <div class="car shadow mb-4">
        <div class="card-header py-3">
            <button href="#" type="button" data-toggle="modal" data-target="#adddel" class="btn btn-success my-3">
                <i class="fas fa-plus"></i> Add New Staff
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped text-center" id="dataTable2">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Action</th>
                            <th style="display: none;"></th>
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
                                <td class="delid" style="display: none;">'.$row["id"].'</td>
                                <td>'.$row["del_name"].'</td>
                                <td>'.$row["del_phone"].'</td>';
                            if($row["del_status"] == 0)
                            {
                                echo '<td class="text-success">Available</td>';
                            }
                            elseif($row["del_status"] == 1)
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
                            echo '
                            <td>'.$row["delemail"].'</td>';

                            echo '<td>
                            <button class="btn btn-info mx-2 editdel" type="button" data-toggle="modal" data-target="#editdel">
                            update
                            </button>
                            <form action="" method="post" class="d-inline">
							<input type="hidden" name="id" value='.$row["id"].'>
							<button class="btn btn-danger" type="submit" name="delete">
							<i class="fas fa-trash "></i>
							</button>
							</form>
                            </td>';

                           echo '</tr>';
                            
                           if(isset($_POST["delete"]))
                           {
                               $id = $_POST["id"];
                               $query = "DELETE FROM `delivery_tb` WHERE `id` = $id";
                               $data = $conn->query($query);
                               echo '<script>
									swal({
										title: "Item Deleted",
										icon: "success",
										button: "close",
										type: "success"
									});
									</script>'; 
									echo '<meta http-equiv="refresh" content= "2;URL=?deleted" />';
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
<!-- modal 1 view details -->
<div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="viewdetails" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewdetails">Update category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row p-2">
                <table class="table table-borderless">
                    <tr>
                        <th>User Name</th>
                        <td class="delname text-dark font-weight-bold"></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td class="deladd text-dark font-weight-bold"></td>
                    </tr>
                    <tr>
                        <th>Total </th>
                        <td class="deltotal text-dark font-weight-bold"></td>
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
                        <tbody class="orditmview">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end modal -->
<!-- modal 2add del -->
            <?php
			if(isset($_REQUEST["adddel"]))
			{
               // PICTURE UPLOAD
				$photo_name = $_FILES['dimg']['name'];
				$file_tmp_loc = $_FILES['dimg']['tmp_name'];
				$file_store_path = "../delivery/assets/userimg/".$photo_name;
               
				move_uploaded_file($file_tmp_loc,$file_store_path);
				
				$name =$_REQUEST["name"];
				$phone =$_REQUEST["phone"];
				$email =$_REQUEST["email"];
				$pass =$_REQUEST["Password"];
				$addres =$_REQUEST["daddress"];
                $jdate = date("Y-m-d");
				
				$sql = "INSERT INTO `delivery_tb`( `del_name`, `profileimg`, `del_phone`, `delemail`, `deladdress`, `delpass`, `joinDate`) 
                VALUES('$name','$photo_name','$phone','$email','$addres','$pass','$jdate')";
                
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
                    Add delivery Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Profile image</label>
                        <input type="file" name="dimg" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" maxlength="13" class="form-control"
                            pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                            placeholder="Enter Phone(+911234567890)" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="example@your.email" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="daddress" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="Password" class="form-control" required>
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
<!-- edit details modal details -->
<?php
if(isset($_POST["updeldata"]))
{
    $delid = $_POST["delid"];
    $uname = $_POST["uname"];
    $uphone = $_POST["uphone"];
    $uemail = $_POST["uemail"];
    $uaddress = $_POST["uaddress"];
    $upassword = $_POST["upass"];

    // PICTURE UPLOAD
    $photo_name = $_FILES['upimg']['name'];
    $file_tmp_loc = $_FILES['upimg']['tmp_name'];
    $file_store_path = "../delivery/assets/userimg/".$photo_name;

    move_uploaded_file($file_tmp_loc,$file_store_path);

    if($photo_name == "")
    {
        $sql = "UPDATE `delivery_tb` SET `del_name`= '$uname',`del_phone`='$uphone',`delemail`='$uemail',`deladdress`='$uaddress',`delpass`='$upassword' WHERE `id` = '$delid'";
        $conn->query($sql);
        echo '<script>
		swal({
			title: "details Updated",
			icon: "success",
			button: "close",
			type: "success"
		});
		</script>';
		echo '<meta http-equiv="refresh" content= "2;URL=?updated" />';
    }
    elseif($photo_name != "")
    {
        $sql = "UPDATE `delivery_tb` SET `del_name`= '$uname' ,`profileimg`='$photo_name',`del_phone`='$uphone',`delemail`='$uemail',`deladdress`='$uaddress',`delpass`='$upassword' WHERE `id` = '$delid'";
        $conn->query($sql);
        echo '<script>
		swal({
			title: "details Updated",
			icon: "success",
			button: "close",
			type: "success"
		});
		</script>';
		echo '<meta http-equiv="refresh" content= "2;URL=?updated" />';
    }


}
?>
<div class="modal fade" id="editdel" tabindex="-1" role="dialog" aria-labelledby="editdel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editdel">
                    Update Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" id="delid" name="delid">
                        <label>Profile image</label>
                        <input type="file" name="upimg" class="form-control-file" >
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="uname" id="uname" class="form-control udname" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="uphone" id="uphone" maxlength="13" class="form-control udtel">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="uemail" id="uemail" class="form-control udemail">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="uaddress" id="uadd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="upass" id="upass" class="form-control udepass">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updeldata" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end  -->
</div>
<!-- End of Main Content -->
<?php include('common/footer.php')?>
<script>
    $(document).ready(function () {
        var dval =$('#deliveryinv').val();
        if(dval != '')
        {
            $('#asigndel').attr("disabled", false);
            $("#warning").hide();
        }
        else{
            $('#asigndel').attr("disabled", true);
            $("#warning").html("select from <a href='neworders.php'>Orders</a> to deliver");
        }
    });
</script>

