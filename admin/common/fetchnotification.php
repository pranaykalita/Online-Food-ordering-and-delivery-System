<?php 
// new notifications order
session_start();
if(isset($_SESSION["aemail"]))
{
    include('../../include/dbcon.php');

    if(isset($_POST["option"]))
    {

        
        $queryx = "SELECT * FROM `allorders_tb` WHERE `ord_status`= 0 ORDER BY `ord_id` DESC";
        $resultx = $conn->query($queryx);
        $output = '';
        
        
        if(mysqli_num_rows($resultx) > 0 )
        {
            while($row = $resultx->fetch_array())
            {
                $ord_date = strtotime($row["ord_date"]);
				$ford_date = date("d-M-Y",$ord_date);
                $ordtime = strtotime($row["ord_time"]);
				$formtime = date("d-M-Y",$ordtime);

                $output.='
                <a class="dropdown-item d-flex align-items-center" href="neworders.php">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-white">
                                                <i class="fas fa-pizza-slice text-success"></i>
                                            </div>
                                        </div>
                <div class="small text-gray-500">New Order</div>
                <span class="font-weight-bold notidetails" >Order <span class="text-danger">'.$row["invid"].'</span> is recived on <span class="text-success">'.$ford_date.'</span> <span >'.$formtime.'</span></span>
                </a>
                ';
            }
        }
        else
        {
            $output = '<div class="small text-dark text-center p-2">No Notifiacations</div>';
        }   
        $sts_q = "SELECT * FROM `allorders_tb` WHERE `not_status` = '0'";
        $datast = $conn->query($sts_q);
        $count = mysqli_num_rows($datast);
        $data = array(
            'notification'=> $output,
            'unreadnotification'=>$count
        );
        echo json_encode($data);
    }

}
else
{
    header("LOCATION: dashboard.php");
}



?>