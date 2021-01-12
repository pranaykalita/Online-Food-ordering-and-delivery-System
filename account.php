<?php
error_reporting(0);
define("TITLE" , "Coders Cafe | Account");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/orders.css" />

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->

    <!-- orders -->
    <section class="orders_page">

<div class="container-fluid">
    <h2 class="py-5 text-center font-weight-bold">MANAGE ACCOUNT</h2>
    <div class="row py-3 justify-content-center">
        <div class="col-md-11 col-11">
            <ul class="nav " id="navtabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#account">Account</a></span></li>
                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#order">Orders</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#manageac">Manage Ac</a></li>
            </ul>
            <!-- contents-->
            <div class="tab-content py-2" id="maincontents">

                <div class="tab-pane fade show active" id="account">
                    <div class="card shadow p-4">
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-4 col-6">
                                <p>Pranay</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-4 col-6">
                                <p>Kalita</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-4 col-6">
                                <p>+911234567890</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-4 col-6">
                                <address>Jorhat tarajan puja mandir</address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-4 col-6">
                                <p>pranaykalita2@gmail.com</p>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="tab-pane fade" id="order">
                   <div class="card shadow p-3">
                       <table class="table mytable display nowrap" style="width: 100%;">
                           <thead>
                               <tr class="tableheader">
                                   <th>Order#</th>
                                   <th>order Date</th>
                                   <th>Items</th>
                                   <th>total</th>
                                   <th>status</th>
                               </tr>
                           </thead>
                           <tbody class="tabledata">
                               <tr>
                                   <td>123258456</td>
                                   <td>10-jan-2021</td>
                                   <td>pizza,roll,sandwich,paneer</td>
                                   <td>₹ 1045.46</td>
                                   <td class="text-danger">pending</td>
                               </tr>
                               <tr>
                                   <td>1232588745</td>
                                   <td>1-jan-2021</td>
                                   <td>pizza</td>
                                   <td>₹ 105.46</td>
                                   <td class="text-success">Delivered</td>
                                  
                               </tr>
                           </tbody>
                       </table>
                   </div>
                </div>
                <div class="tab-pane fade " id="manageac">
                    <div class="card shadow p-4">
                        <form>
                            <div class="form-group">
                              <label for="name">First Name</label>
                              <input type="text" class="form-control name" placeholder="john" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Last Name</label>
                              <input type="text" class="form-control name" placeholder="Doe" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Phone</label>
                              <input type="number" class="form-control name" placeholder="1234567890" required>
                            </div>
                            <div class="form-group">
                              <label for="name">Address</label>
                              <textarea type="text" rows="3" class="form-control name" placeholder="Address,landmark,house no" required></textarea>
                            </div>
                            <div class="form-group">
                              <label for="name"> Password reset</label>
                              <input type="text" class="form-control name" placeholder="enter new Pssword (optional)">
                            </div>
                            <div class="form-group text-center">
                                <input class="btn btn-success submit-btn px-2" type="submit" value="submit">
                            </div>
                          </form>
                    </div>   
                </div>
            </div>
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

</body>

</html>