<?php include("./common/header.php");

$deliveryid = $_SESSION["deliveryid"];
$query = "SELECT * FROM `delivery_tb` WHERE `id` = '$deliveryid'";
$data = $conn->query($query);
$row = $data->fetch_assoc();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Profile</h1>

            <!-- profile -->
            <div class="container">
                <div class="main-body">

                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src='<?php echo delimg.$row["profileimg"]; ?>' alt="Admin"
                                            class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4><?php echo $row["del_name"] ?></h4>
                                            <p class="text-secondary mb-1">Joined on <?php 
                                            $date = strtotime($row["joinDate"]);
                                            $joindate = date("d-M-Y",$date);
                                            echo $joindate; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $row["del_name"] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $row["delemail"] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $row["del_phone"] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $row["deladdress"] ?>
                                        </div>
                                    </div>
                                    <hr>
                                   
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <!-- end profile -->

        </div>
    </main>
    <?php include("./common/footer.php");