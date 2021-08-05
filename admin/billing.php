<?php
define("TITLE" , "FOODZILLA | ADMIN");
include('common/header.php');
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
                Bills and order data
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Invoice Id</th>
                            <th>order Date</th>
                            <th>UserName</th>
                            <th>Total Amount</th>
                            <th>phone</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                                    $sql = "SELECT * FROM `allorders_tb`  order by `ord_id` desc";
                                    $res = $conn->query($sql);
                                    while($row = $res->fetch_assoc())
                                    {
                                        $ord_date = strtotime($row["ord_date"]);
										$ford_date = date("d-M-Y",$ord_date);

                                        echo '
                                        <tr>
                                            <td class="font-weight-bold">'.$row["invid"].'</td>
                                            <td >'.$ford_date.'</td>
                                            <td >'.$row["ord_user"].'</td>
                                            <td>₹ '.$row["ord_totlprice"].'</td>
                                            <td >'.$row["ord_phone"].'</td>

                                            <td>
                                    
                                                <form action="vieworders.php" method="post" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["ord_id"].'>
                                                    <button class="btn btn-primary" type="submit" name="view">
                                                    <i class="fas fa-eye "></i> View
                                                    </button>
                                                </form>

                                                <form action="printbill.php" target="_blank" method="post" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["ord_id"].'>
                                                    <button class="btn btn-danger" type="submit" name="Bill">
                                                    <i class="fas fa-receipt "></i> DOWNLOAD
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>';
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
<?php include("common/footer.php") ?>