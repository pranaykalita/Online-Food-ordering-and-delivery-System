<?php

if(!isset($_SESSION["adminemail"]))
{
    echo '<h6>404 File Not Found</h6>';
    echo '<a href="/">click here to go back</a>';
}
else{
    header("LOCATION: dashboard.php");
}

?>