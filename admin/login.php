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

  $uname = $conn->real_escape_string($_POST['aUname']);
  $pass = $conn->real_escape_string($_POST['aPassword']);

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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Admin
					</span>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="aUname">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="aPassword">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<span class="warnmsg"><?php echo $msg; ?></span>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="loginadmin" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>