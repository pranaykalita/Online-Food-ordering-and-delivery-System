<?php
define("TITLE" , "coders Cafe | Cart");
include('include/dbcon.php');
include('include/head.php'); 

if(!isset($_SESSION["username"]))
{
	header("LOCATION: /login.php");
}
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/account.css" />
</head>

<body>

    <?php include('include/header.php'); ?>
    <!-- content -->
    <?php
if(isset($_REQUEST['uupdate'])){

    $firstname = $_REQUEST['ufname'];
    $lastname = $_REQUEST['ulname'];
    $phone = $_REQUEST['uphn'];
    $addrs = $_REQUEST['uaddr'];


    $sql = "UPDATE `user_details` SET `Fname`='$firstname',`Lname`='$lastname',`uphone`='$phone',`uadd`='$addrs' WHERE uname = '{$_SESSION["username"]}'";
    $conn->query($sql);
    echo '<script>
    swal({
        title: "Details Updated",
        icon: "success",
        button: "close",
        type: "success"
    });
    </script>';
}
?>
    <!-- home -->
    <section id="cart">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11 col-11 mx-auto mt-5">
                    <ul class="nav " id="navtabs">
                        <li class="nav-item"><a class="nav-link actice" data-toggle="pill" href="#order">Orders</a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="pill" href="#account">Account</a></span>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#manageac">Manage Ac</a></li>
                    </ul>

                    <?php
                // data ac detaila
                $sql = "SELECT * FROM `user_details` WHERE uname = '{$_SESSION["username"]}'";
                $data = $conn->query($sql);
                $row = $data->fetch_assoc();
                echo '
                <!-- contents-->
                <div class="tab-content py-2" id="maincontents">
                <div class="tab-pane fade show" id="account">
                <div class="card shadow p-4">
                <div class="row">
                <div class="col-md-4 col-6">
                                    <label>UserName</label>
                                    </div>
                                <div class="col-md-4 col-6">
                                    <p>'.$row["uname"].'</p>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-6">
                                <label>First Name</label>
                                </div>
                                <div class="col-md-4 col-6">
                                <p>'.$row["Fname"].'</p>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 col-6">
                            <label>Last Name</label>
                            </div>
                                <div class="col-md-4 col-6">
                                <p>'.$row["Lname"].'</p>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 col-6">
                            <label>Phone</label>
                            </div>
                                <div class="col-md-4 col-6">
                                <p>'.$row["uphone"].'</p>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4 col-6">
                                    <label>Address</label>
                                    </div>
                                    <div class="col-md-4 col-6">
                                    <address>'.$row["uadd"].'</address>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4 col-6">
                                    <label>Email</label>
                                    </div>
                                <div class="col-md-4 col-6">
                                <p>'.$row["umail"].'</p>
                                </div>
                                </div>
                        </div>
                        </div>';
                    //order table 

                    $sql2 = "SELECT * FROM `orders_all` WHERE ord_user = '{$_SESSION["username"]}' order by `ord_id` desc";
                    $data2 = $conn->query($sql2);
                    
                    // start order tbele
                   
                    echo '
                    <div class="tab-pane fade show active" id="order">
                    <div class="card shadow p-3">
                    <table class="table mytable display nowrap" style="width: 100%;">
                               <thead>
                               <tr class="tableheader">
                               <th>Order#</th>
                               <th>order Date</th>
                               <th>total</th>
                               <th>status</th>
                               <th>Action</th>
                               </tr>
                               </thead>
                               <tbody class="tabledata">';
                               while($row2 = $data2->fetch_assoc()){
                                   echo '
                                <tr>
                                       <td class="ord_id">'.$row2["ord_id"].'</td>
                                       <td>'.$row2["ord_date"].'</td>';
                                       echo '<td>₹ '.$row2["ord_totlprice"].'</td>';
                                       if($row2["ord_status"] == 1){
                                           echo '<td class="text-success"><i class="fas fa-check-circle"></i> Delevered</td>';
                                       }else 
                                       if ($row2["ord_status"] == 0){
                                        echo '<td class="text-danger"><i class="fas fa-hourglass-half"></i> pending</td>';
                                       }
                                       echo'
                                       <td>
                                   <button type="button" class="btn btn-info mr-3 view_btn" data-toggle="modal" data-target="#vieworders">
                                   <i class="fas fa-eye"></i>
                                   </button>
                                    </td>
                                </tr>';
                                }
                                echo '</tbody>
                           </table>
                       </div>
                       </div>
                       
                    <div class="tab-pane fade " id="manageac">
                    <div class="card shadow p-4">
                    <form method="POST" action="">
                                <div class="form-group">
                                    <label for="uname">User Name</label>
                                    <input type="text" class="form-control name" placeholder="'.$row['uname'].'" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="fname">Last Name</label>
                                    <input type="text" class="form-control name" name="ufname"  value="'.$row['Fname'].'" >
                                </div>
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control name" name="ulname"  value="'.$row['Lname'].'" >
                                </div>
                                <div class="form-group">
                                    <label for="num">Phone</label>
                                    <input type="tel" class="form-control name" placeholder="phone (e.g. +91155552675)" pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})" name="uphn"  value="'.$row['uphone'].'" required>
                                </div>
                                <div class="form-group">
                                    <label for="add">Address</label>
                                    <textarea type="text" rows="3" class="form-control name" name="uaddr" >'.$row['uadd'].'</textarea>
                                </div>
                                <div class="form-group text-center">
                                    <input class="btn btn-success submit-btn px-2" name="uupdate"  type="submit" value="Update">
                                </div>
                                </form>
                        </div>   
                        </div>
                </div>'; 
                  
                    // modal template   
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="vieworders" tabindex="-1" role="dialog"
                        aria-labelledby="vieworders" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">View Orders</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- order id table -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody class="orddet">
														
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      ?>
                    <p id="msg"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- end contant -->
    <!-- footer common with common scripts -->
    <?php 
include('include/footer.php');
include('include/cmonscripts.php');
?>
<script>
$(document).ready(function(){

$('.view_btn').click(function(e){
    e.preventDefault();

    var stud_id = $(this).closest("tr").find(".ord_id").text();

    $.ajax({
        type: 'POST',
        url:'orderac.php',
        data: {
            'chek_viewBtn':true,
            'ord_ifBtn': stud_id,
        },
        success: function(response){

        $('.orddet').html(response);
        }
    });
});
});
</script>

</body>

</html>