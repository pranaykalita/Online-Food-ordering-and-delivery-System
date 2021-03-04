
<?php
include('include/dbcon.php');
date_default_timezone_set("Asia/Calcutta");
// get data
if(isset($_POST["billdwn"]))
{
    $ordid = $_POST["id"];
    $query = "SELECT * From `allorders_tb` WHERE `ord_id` = '{$ordid}'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}
// order view bill details vieworder.php
	$array = $row["ord_items"];
	$items = unserialize($array);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/billtemplate.css">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <!-- to pdf -->
    <script>
        function printpdf() {
            const element = document.getElementById("invoice");

            var opt =
            {
                filename: '<?php echo $row["invid"]; ?>'
            }

            html2pdf().from(element).set(opt).save();
        }

        function directprint(){

            const element = document.getElementById("invoice");
            html2pdf().from(element).toPdf().get('pdf').then(function (pdf) {
            pdf.autoPrint();
            window.open(pdf.output('bloburl'), '_blank');
            });
                
        }
    </script>

</head>

<body>
   
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-wrapper" id="invoice">
                <div class="intro">
                    <h2>Coders .Cafe</h2>
                </div>

                <div class="payment-info">
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Invoice No.</span>
                            <strong><?php echo $row["invid"]; ?></strong>
                        </div>
                        <div class="col-sm-6 text-right">
                            <span>Bill Date</span>
                            <strong><?php echo  $row["ord_date"]. ' - '. $row["ord_time"]; ?></strong>
                        </div>
                    </div>
                </div>

                <div class="payment-details">
                    <div class="row">
                        <div class="col-sm-6">
                            <span>TO,</span>
                            <strong>
                                <?php echo $row["ord_user"]; ?>
                            </strong>
                            <p>
                                <?php echo $row["ord_addrs"]; ?> <br>
                                <a href="#">
                                    <?php echo $row["ord_email"]; ?>
                                </a> <br>
                                <?php echo $row["ord_phone"]; ?>

                            </p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <span>User Account</span>
                            <strong>
                                <?php echo $row["ord_user"]; ?>
                            </strong>

                        </div>
                    </div>
                </div>

                <div class="line-items">
                    <div class="items">
                        <!-- TABLE -->
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
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
                                                    <td>'.$value["quantity"]*$value["Item_price"].'</td>
                                                    </tr>';
                                                }
                                            ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- end -->
                    </div>
                    <div class="total text-right">
                        <p class="extra-notes">
                            CUSTOMER COPY<br>Thanks for Visiting Coders. Cafe
                        </p>
                        <div class="field grand-total">
                            Total <span>₹ <?php echo $row["ord_totlprice"]; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row m-5 ">
        <div class="col text-center">
            <button class="btn btn-primary m-3" onclick="directprint()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
            <button class="btn btn-success" onclick="printpdf()"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>