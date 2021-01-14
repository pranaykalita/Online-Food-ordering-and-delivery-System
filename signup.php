<?php
define("TITLE" , "Coders Cafe");
include('include/dbcon.php');
include('include/head.php'); 
?>

<!-- include custom stylesheet -->
<link rel="stylesheet" href="css/signup.css">

</head>

<body>

    <?php include('include/header.php'); ?>

    <!-- content -->
    <?php
    
    if(isset($_REQUEST["signup"])){
        $uname = $_REQUEST['uname'];
        $email = $_REQUEST['email'];
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $add = $_REQUEST['addr'];
        $phone = $_REQUEST['phone'];
        $pass = $_REQUEST['password'];
        $term = $_REQUEST['agree-term'];

        $chk = "SELECT * FROM `user_details` WHERE `uname` = '{$uname}' OR `umail` = '{$email}'";
        $res = $conn->query($chk);
        

        if($row = mysqli_num_rows($res) > 0 )
        {
            echo '<script>
			swal({
				title: "Account already Exists! Please login ",
				button: "Login",
				type: "success"
			}).then(function() {
                window.location = "login.php";
            });
			</script>';
        }
        else
        {
        $sql = "INSERT INTO `user_details`(`uname`, `Fname`, `Lname`, `umail`, `uphone`, `uadd`, `upass`, `uterms`)
                VALUES ('$uname','$fname','$lname','$email','$phone', '$add','$pass','$term')";
        $conn->query($sql);
        
        echo '<script>
			swal({
				title: "Account Created Please login ",
				button: "Login",
				type: "success"
			}).then(function() {
                window.location = "login.php";
            });
			</script>';
        }

    }
    ?>
    <!-- signup -->
    <section class="signup">
        <div class="container ">
            <div class="signup-content">

                <form action="" method="POST" class="signup-form" autocomplete="off">

                    <h2 class="form-title">Create account</h2>
                    <p style="color:red;" id="phperror"></p>

                    <div class="form-group">
                        <input type="text" class="form-input" name="uname" id="username" required
                            placeholder="username" />
                        <span id="usermsg"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="fname" id="fname" required
                            placeholder="First Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="lname" id="lname" required
                            placeholder="Last Name" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" required
                            placeholder="Your Email" />
                    </div>
                    <div class="form-group">
                        <textarea type="address" class="form-input" name="addr" id="addr" required
                            placeholder="Your address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-input"
                            pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                            name="phone" required placeholder="phone (e.g. +91155552675)" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" required
                            placeholder="Password" />

                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="re_password" id="re_password" required
                            placeholder="Repeat your password" />
                    </div>
                    <span id='passwordcnf'></span>
                    <div class="form-group">
                        <input type="checkbox" required name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term">
                            <span>
                                <span></span></span>I agree all statements in
                            <a href="#" class="term-service">Terms of service</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="signup" id="submit" class="form-submit" />
                    </div>
                </form>
                <p class="loginhere">
                    <p id="loginlink">Have already an account?
                        <a href="login.html" class="loginhere-link">Login here</a>
                    </p>

                </p>

            </div>
        </div>
    </section>

    <!-- end contant -->

    <!-- footer common with common scripts -->
    <?php 
    include('include/cmonscripts.php');
    ?>

</body>

</html>