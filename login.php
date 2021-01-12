<?php
error_reporting(0);
define("TITLE" , "Coders Cafe");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="css/util.css" />

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->

   <!-- login -->
	<div class="container-login100">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="" method="post" class="login100-form validate-form">
				<span class="login100-form-title p-b-37"> Sign In </span>
				<p class="text-danger warning">Wrong username or password</p>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="username" placeholder="username or email" />
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
					<input class="input100" type="password" name="pass" placeholder="password" />
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button name="login" class="login100-form-btn">Sign In</button>
				</div>

				<br />

				<div class="text-center">
					<a href="signup.php" class="txt2 hov1"> Sign Up </a>
				</div>
			</form>
		</div>
	</div>

    <!-- end contant -->

    <!-- footer common with common scripts -->
    <?php 
    include('include/footer.php');
    include('include/cmonscripts.php');
    ?>

</body>

</html>