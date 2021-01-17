<?php 
define("TITLE" , "Coders Cafe | ADMIN");
include('common/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <!-- DataTalbes Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">registered Users</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `user_details` order by `uid` desc";
                        $data=$conn->query($sql);
                        while($row = $data->fetch_assoc())
                        {
                            echo '
                            <tr>
                            <td>'.$row["uname"].'</td>
                            <td>'.$row["umail"].'</td>
                            <td>'.$row["uphone"].'</td>
                            <td>'.$row["uadd"].'</td>
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
<?php include('common/footer.php')?>