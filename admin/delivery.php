<?php 
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');

if(isset($_REQUEST["asigndelivery"])){
    $ordNo = $_REQUEST["id"];
}
// set out for del
if(isset($_REQUEST["assigndel"])){
    $ordNo = $_REQUEST["ordno"];
    $sid = $_REQUEST["delper"];

    // set order status
    $sql1 = "UPDATE `orders_all` SET `ord_status`= '2' WHERE `ord_id` = '{$ordNo}'";
    // set del person status
    $sql2 = "UPDATE `staff_tb` SET `del_status`= '1' WHERE `staff_id` = '{$sid}'";
    $conn->query($sql1);
    $conn->query($sql2);
    echo '<script>
    swal({
        title: "Out For Delivery",
        icon: "success",
        button: "close",
        type: "success"
    });
    </script>';
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">manage recent Orders</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <!-- assign rider -->
            <div class=" card rounded shadow mb-4 p-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Ord No</label>
                        <input type="number" name="ordno" class="form-control" value="<?php echo $ordNo; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Delivery Id</label>
                        <select type="text" name="delper" class="form-control" required="required">
                            <?php
                             $sql = "SELECT * FROM `staff_tb` WHERE `occupation` = 'Delivery' AND `del_status` = 0";
                             $data = $conn->query($sql);
                             while($row = $data->fetch_assoc()){
                                 echo '<option class="text-success">'.$row["staff_id"].'</option>';
                             }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="assigndel" class="btn btn-primary" value="assign Delivery">
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
                            <th>user Name</th>
                            <th>delivery Person</th>
                            <th>phone</th>
                            <th>Action</th>
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
            <!-- table -->
            <p class="text-dark card shadow p-2 font-weight-bold">Available Delivery Person</p>

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>status</th>
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