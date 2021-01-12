<?php
error_reporting(0);
define("TITLE" , "coders Cafe | Cart");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/account.css" />
</head>

<body>

    <?php include('include/header.php'); ?>
<!-- content -->
<!-- home -->
<section id="cart">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 col-11 mx-auto mt-5">
                <ul class="nav " id="navtabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="pill"
                    href="#account">Account</a></span></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#order">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#manageac">Manage Ac</a></li>
                </ul>
                <?php
                // data ac detaila
                $sql = "SELECT * FROM `user_details`";
                $data = $conn->query($sql);
                $row = $data->fetch_assoc();
                echo '
                <!-- contents-->
                <div class="tab-content py-2" id="maincontents">
                <div class="tab-pane fade show active" id="account">
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
                    $sql2 = "SELECT * FROM `order_confirmed`";
                    $data2 = $conn->query($sql2);
                    
                    // start order tbele
                    echo '
                    <div class="tab-pane fade" id="order">
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
                                   echo '<tr>
                                       <td>'.$row2["ord_id"].'</td>
                                       <td>'.$row2["ord_date"].'</td>';
                                       echo '<td>₹ '.$row2["ord_total"].'</td>';
                                       if($row2["ord_status"] == 1){
                                           echo '<td class="text-danger">Delevered</td>';
                                       }else 
                                       if ($row2["ord_status"] == 0){
                                        echo '<td class="text-danger">pending</td>';
                                       }
                                       echo'
                                       <td>
                                   <button type="submit" class="btn btn-info mr-3" id="ordnum" name="view" data-toggle="modal" data-target="#exampleModalLong" value='. $row2["ord_id"].'>
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
                    <form>
                    <div class="form-group">
                                  <label for="uname">User Name</label>
                                  <input type="text" class="form-control name" placeholder="john@99" required>
                                </div>
                                <div class="form-group">
                                <label for="fname">First Name</label>
                                  <input type="text" class="form-control name" placeholder="john" required>
                                  </div>
                                <div class="form-group">
                                <label for="lname">Last Name</label>
                                  <input type="text" class="form-control name" placeholder="Doe" required>
                                  </div>
                                  <div class="form-group">
                                  <label for="num">Phone</label>
                                  <input type="number" class="form-control name" placeholder="1234567890" required>
                                  </div>
                                <div class="form-group">
                                <label for="add">Address</label>
                                <textarea type="text" rows="3" class="form-control name" placeholder="Address,landmark,house no" required></textarea>
                                </div>
                                <div class="form-group">
                                <label for="pass"> Password reset</label>
                                  <input type="text" class="form-control name" placeholder="enter new Pssword (optional)">
                                  </div>
                                <div class="form-group text-center">
                                <input class="btn btn-success submit-btn px-2" type="submit" value="submit">
                                </div>
                                </form>
                        </div>   
                        </div>
                </div>';   
                $sqljs = "SELECT * FROM `order_confirmed`";
                    $datajsn = $conn->query($sqljs);
                    $jsnr = $datajsn->fetch_assoc();
                    
                    // sql to fetch JSON data
                    $jsndata = $jsnr["ord_items"];
                    $jsd = json_decode($jsndata, true);
                    // modal template   
                    echo '
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                <tbody>';
                                foreach($jsd as $jsnrow){
                                    echo '
                                        <tr>
                                        <td>'.$jsnrow['item_name'].'</td>
                                        <td>'.$jsnrow['item_qty'].'</td>
                                        <td>'.$jsnrow['item_price'].'</td>
                                        </tr>';
                                    }
                            echo '</tbody>
                            </table>';   
                         echo '</div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>
                         </div>
                      </div>
                      </div>';
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
<script type="text/javascript">
    function clickButton(){
    var name=document.getElementById('name').value;
    var descr=document.getElementById('descr').value;
    $.ajax({
            type:"post",
            url:"server_action.php",
            data: 
            {  
               'name' :name,
               'descr' :descr
            },
            cache:false,
            success: function (html) 
            {
               alert('Data Send');
               $('#msg').html(html);
            }
            });
            return false;
     }
</script>

</body>

</html>