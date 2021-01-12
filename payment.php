<?php
error_reporting(0);
define("TITLE" , "Coders Cafe | payment");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/payment.css" />

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->

    <!-- home -->		
    <section id="payment">
          <div class="container-fluid">
               <div class="row cardpay">
                    <div class="col-md-11 col-11 mx-auto " >
                         <div class="row mt-5 ">
                              <!-- card -->
                              <div class="col-md-12 col-lg-11 col-11 mx-auto mb-lg-0 mb-5">
                                   <div class="card p-3 my-4 shadow">
                                        <div class="row">
                                            <div class="col">
                                             <h3><i class="fas fa-wallet"></i> payments</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                             <form>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control name" placeholder="john" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="tel" class="form-control name" placeholder="phone number" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <textarea type="text" rows="3" class="form-control name" placeholder="Address,house no" required></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control name" placeholder="landmark">
                                                  </div>
                                                  <div class="form-group">
                                                    <p class="mode">payment Mode: <span class="text-danger">Cash</span></p>
                                                  </div>
                                                  <div class="form-group text-center">
                                                      <input class="btn btn-primary submit-btn px-4" type="submit" onclick="sucess()" value="Order">
                                                  </div>
                                                </form>
                                            </div>
                                            <div class="col-md-7">
                                             <div class="card shadow rounded-lg p-2">
                                                  <div class="col-md-12">
                                                      <table class="table">
                                                          <thead>
                                                              <tr>
                                                                  <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                                                  <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                                                  <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                                                                  <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              <tr>
                                                                  <td>ice cream</td>
                                                                  <td>2</td>
                                                                  <td>150.00</td>
                                                                  <td>300.00</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>pizza</td>
                                                                  <td>1</td>
                                                                  <td>200.00</td>
                                                                  <td>400.00</td>
                                                              </tr>

                                                          </tbody>
                                                      </table>
                                                  </div>
                                                  <div class="py-3 px-5 text-right">
                                                      <div class="mb-2 font-weight-bold">Total amount</div>
                                                      <div class="h3 font-weight-light">₹ 600.00</div>
                                                  </div>
                                          </div>
                                            </div>
                                        </div>
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