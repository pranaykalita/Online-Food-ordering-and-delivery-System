<!DOCTYPE html>
<?php include 'php/connection.php' ?>

<html style="font-size: 16px;" lang="en-IN">
    <head><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <title>Menu</title>

        <link rel="stylesheet" href="css/Menu.css" media="screen">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body class="u-body u-overlap ">

        <!-- header -->
        <?php include 'header.php' ?>
        <!-- end -->
        
        <?php
    session_start();
   //session_destroy();
    if(isset($_REQUEST['atcart'])){
        if(isset($_SESSION['cart'])){
            
            $existitems = array_column($_SESSION['cart'], 'itemname');

            if(in_array($_REQUEST['itemname'],$existitems)){
                // if item exist
                echo "<script>swal('Item Already Added');</script>";

            }
            else
            {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] =  array('itemname'=>$_REQUEST['itemname'],'price'=>$_REQUEST['itemprice'],'quantity'=>1);
            echo "<script>swal('Added To cart', '', 'success');</script>";
            }


        }
        else{
            $_SESSION['cart'][0] = array('itemname'=>$_REQUEST['itemname'],'price'=>$_REQUEST['itemprice'],'quantity'=>1);
            echo "<script>swal('Added To cart', '', 'success');</script>";
        } 
    }
      
?>
        <?php 

$sql_1 = "SELECT * FROM `category` where active = 1" ;
$data_1 = mysqli_query($conn, $sql_1);


while($ret_item =mysqli_fetch_assoc($data_1))
{
    ?>

        <section
            class="u-align-center u-clearfix u-white u-section-1"
            id="<?php echo $ret_item['category']; ?>">
            <div class="u-clearfix u-sheet u-sheet-1"><br><br>
                <h1 class="u-custom-font u-font-Lobster u-text u-title u-text-1"><?php echo $ret_item['category']; ?></h1>
                <!-- item list -->
                
                    <div class="u-expanded-width-sm u-list u-repeater u-list-1">

                        <!-- item section 1 example -->
                        <?php 
                            $_catno = $ret_item['category'];
                            $sql = "SELECT * FROM `menu` where category=  '{$ret_item['category']}' " ;
                            $data = mysqli_query($conn, $sql);
                            while($ret = mysqli_fetch_assoc($data)){
                        ?>
                        <form action="" method="post">
                        <div
                            class="u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1"
                            data-animation-name="zoomIn"
                            data-animation-duration="1000"
                            data-animation-delay="0"
                            data-animation-direction="">
                            <div
                                class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                                <img
                                    alt=""
                                    class="u-align-center u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1"
                                    src="<?php echo dish_image.$ret['image'] ?>">
                                <div
                                    class="u-align-center u-container-style u-expanded-width u-group u-video-cover u-group-1">
                                    <div class="u-container-layout u-container-layout-2">
                                        <h3 class="u-align-center u-custom-font u-font-oswald u-text u-text-2"><?php echo $ret['item']; ?></h3>
                                        
                                        <h6 name="price" class="u-text u-text-palette-3-base u-text-3">₹<?php echo $ret['price'] ?></h6>
                                        
                                        <!-- to send data to cart -->
                                        <input name="itemname" value="<?php echo $ret['item']; ?>" type="hidden"></input>
                                        <input name="itemprice" value="<?php echo $ret['price']; ?>" type="hidden"></input>

                                        <?php

                               echo '
                               <button type="submit" class="u-btn u-btn-rectangle u-button-style u-grey-10 u-btn-1" name="atcart" value='.$ret["id"].'>add to cart</button>';
                                ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- end item section -->
                        <?php 
                     } 
                         ?>

                    </div>
                
                <!-- end -->
            </div>
        </section>
        <!-- end salad -->

        <?php

}
     ?>

        <!-- include footer.html -->
        <?php include 'footer.php' ?>

        <!-- footer end -->
    </body>
</html>