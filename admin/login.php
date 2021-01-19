<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["aemail"]))
{
    header("LOCATION: dashboard.php");
}
$msg = '';
if(isset($_POST['loginadmin']))
{
  include('../include/dbcon.php');

  $uname = $_POST['aUname'];
  $pass = $_POST['aPassword'];

  $sql = "SELECT `admin_id`,`admin_name`,`admin_email`,`admin_pass`,`admin_image`  FROM `admin_tb` WHERE  `admin_email` = '{$uname}'  AND `admin_pass` = '{$pass}'";
  $result = $conn->query($sql);
  
  if(mysqli_num_rows($result) > 0)
  {
    while($row = $result->fetch_assoc())
    {
      session_start();
      
      $_SESSION["aid"] = $row['admin_id'];
      $_SESSION["aname"] = $row['admin_name'];
      $_SESSION["aemail"] = $row['admin_email'];
      $_SESSION["aimg"] = $row['admin_image'];

      header("LOCATION: index.php");

    }

  }
  else
  {
    $msg = "USERNAME OR PASSWORD ARE NOT MATCHED.";
  }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
            
                <div class="col-lg-12 login-title mt-4">
                    Coders Cafe
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" name="aUname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="aPassword" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                <div class="msg text-danger"><?php echo $msg; ?></div>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" name="loginadmin" >LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>
</html>