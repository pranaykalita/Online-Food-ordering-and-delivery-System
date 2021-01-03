<?php include ('php/connection.php') ;
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="cart.css">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    </head>
    <body class="u-body u-overlap">
    <?php include 'header.php'?>
    <br><br>
        <div class="row">
            <div class="col-lg-8 m-5">
                <table class="table text-center" style="font-size: 11px;">
                    <thead>
                        <tr>
                            <th scope="col">item no.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    $total ='0';

    //   get array
    if(isset($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $key => $value)
    {
        $itmno = $key+1;
       
        $value['price'] = $value['price']*$value['quantity'];
        $total=$total+$value['price'];

        echo "
        <tr>
        <th>$itmno</th>
        <td>$value[itemname]</td>
        <td>$value[price]</td>
        <td>
        <form action='cartdata.php' method='post'>
        <input type='number' min='1' max='10'  name='qtyn' value='$value[quantity]'>
        <button class='btn btn-sm btn-outline-danger' name='itmqty'><i class='fas fa-sync'></i></button>
        <input type='hidden' name='item_qty' value='$value[itemname]'>
        </form>
        </td>

        <td>
        <form action='cartdata.php' method='post'>
        <button class='btn btn-sm btn-outline-danger' name='rmvitm'>Remove</button>
        <input type='hidden' name='item_name' value='$value[itemname]'>
        </form>
        </td>
        </tr>
        ";
    }
}
    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 mt-5">
                <div class="border bg-light rounded p-4">
                    <h4>Total</h4>
                    <h5 class="text-right"><?php echo $total; ?></h5>
                    <br>
                    <form action="" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" aria-label="Radio button for following text input">
                                </div>
                            </div>
                            <label class="form-control">
                                COD</label>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block">ORDER NOW</button>
                    </form>
                </div>

            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

            <?php include 'footer.php'?>
    </html>