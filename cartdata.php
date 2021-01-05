<?php
session_start();
// session_destroy();
        // if rmv
        if(isset($_REQUEST['rmvitm']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['itemname'] == $_REQUEST['item_name'])
                {
                unset($_SESSION['cart'][$key]);
                // rearange order of cart
                $_SESSION['cart']= array_values($_SESSION['cart']);
                echo "<script>window.location.href='cart.php'</script>";
                }
            }
        }

         // if update
         if(isset($_REQUEST['itmqty']))
         {
             $nq = $_REQUEST['qtyn'];
             
             foreach($_SESSION['cart'] as $key => $value)
             {
                
            if($value['itemname'] == $_REQUEST['item_qty'])
            {
            $_SESSION['cart'][$key] =  array_replace($value, ['quantity'=> $nq]);
        
            //   array_replace($value, ['quantity'=>'6']);
              echo "<script>window.location.href='cart.php'</script>";
            }
           
             }
         }
    ?>
