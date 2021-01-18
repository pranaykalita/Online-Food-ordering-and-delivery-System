<?php
session_start();
// session_destroy();

        // if update
        if(isset($_REQUEST['itmqty']))
        {
            $nq = $_REQUEST['itmquantity'];
            
            foreach($_SESSION['cart'] as $key => $value)
            {
               
           if($value['Item_name'] == $_REQUEST['item_qty'])
           {
           $_SESSION['cart'][$key] =  array_replace($value, ['quantity'=> $nq]);
        
           //   array_replace($value, ['quantity'=>'6']);
             echo "<script>window.location.href='cart.php'</script>";
           }
          
            }
        }

        if(isset($_POST['remove_item']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                print_r($key);
                if($value['Item_name'] == $_POST['itmname'])
                {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>alert('Item Removed');window.location.href='cart.php';</script>";
                }
            }
        }
?>