<?php
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');

if(isset($_POST["view"]))
{
    $ordid = $_REQUEST["id"];
    $query = "SELECT * From `allorders_tb` WHERE `ord_id` = '{$ordid}'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}
// order view bill details vieworder.php
	$array = $row["ord_items"];
	$items = unserialize($array);
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Billing</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Order Details
            </h6>
        </div>

        <div class="card-body">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Order By</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row["ord_user"]; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Order Total</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row["ord_totlprice"]; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row["ord_addrs"]; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row["ord_phone"]; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Delivered By</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row["del_per"]; ?>
                                </div>
                            </div>
                        </div>

                        <!-- table for items -->
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- convert array to data tables -->

                                    <?php
                                        foreach($items as $key => $value)
                                        {
                                            echo '
                                            <tr>
                                            <td>'.$value["Item_name"].'</td>
                                            <td>'.$value["Item_price"].'</td>
                                            <td>'.$value["quantity"].'</td>
                                            </tr>';
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>

                        <div class=" text-center justify-content-between mb-4">
                            <a href="billing.php" type="button"class="btn btn-danger"><i class="fas fa-back"></i> Back</a>
                        </div>

                    </div>
                    <!-- /.container-fluid -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php include("common/footer.php") ?>