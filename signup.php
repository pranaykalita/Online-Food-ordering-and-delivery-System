<!DOCTYPE html>
<?php include '/php/connection.php' ?>
<?php include '/php/register.php'?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Font Icon -->
        <link
            rel="stylesheet"
            href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/logincss/signup.css">
        <link rel="stylesheet" type="text/css" href="css/logincss/util.css">
        <link rel="stylesheet" type="text/css" href="css/logincss/main.css">

        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="/images_login/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link
            rel="stylesheet"
            type="text/css"
            href="/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
       

        <!-- for header and footer-->
        <link rel="stylesheet" href="css/static.css" media="screen">
        <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="js/static.js" defer=""></script>
        <!-- end -->

        
    </head>

    <body
        class="u-body u-overlap u-overlap-transparent"
        style="background-image: url('/images/blog_bg.jpg');">

        <?php include 'header.php' ?>

        <div class="main">

            <section class="signup">
                <div class="container">
                    <div class="signup-content">

                        <form action="" method="POST" id="signup-form" class="signup-form">

                            <h2 class="form-title">Create account</h2>
                            <p style="color:red;" id="phperror"><?php echo $msg; ?></p>

                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-input"
                                    name="name"
                                    id="name"
                                    required=""
                                    placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-input"
                                    name="email"
                                    id="email"
                                    required=""
                                    placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <input
                                    type="tel"
                                    class="form-input"
                                    pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                    name="phone"
                                    placeholder="phone (e.g. +91155552675)"/>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-input"
                                    name="password"
                                    id="password"
                                    required=""
                                    placeholder="Password"/>

                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-input"
                                    name="re_password"
                                    id="re_password"
                                    required=""
                                    placeholder="Repeat your password"/>
                                <span toggle="#re_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            <span id='message'></span>
                            <div class="form-group">
                                <input
                                    type="checkbox"
                                    required=""
                                    name="agree-term"
                                    id="agree-term"
                                    class="agree-term"/>
                                <label for="agree-term" class="label-agree-term">
                                    <span>
                                        <span></span></span>I agree all statements in
                                    <a href="#" class="term-service">Terms of service</a>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="signup" id="submit" class="form-submit"/>
                            </div>
                        </form>
                        <p class="loginhere">
                            <p id="loginlink">Have already an account?
                                <a href="/login.php" class="loginhere-link">Login here</a>
                            </p>

                        </p>

                    </div>
                </div>
            </section>

        </div>
        <?php include 'footer.php'?>
     

        <!-- JS -->
        < src="vendor/jquery/jquery-3.2.1.min.js"></>
        < src="js/loginjs/signup.js"></>
      
        <!--===============================================================================================-->
        < src="vendor/jquery/jquery-3.2.1.min.js"></>
        <!--===============================================================================================-->
        < src="vendor/animsition/js/animsition.min.js"></>
        <!--===============================================================================================-->
        < src="vendor/bootstrap/js/popper.js"></>
        < src="vendor/bootstrap/js/bootstrap.min.js"></>
        <!--===============================================================================================-->
        < src="vendor/select2/select2.min.js"></>
        <!--===============================================================================================-->
        < src="vendor/daterangepicker/moment.min.js"></>
        < src="vendor/daterangepicker/daterangepicker.js"></>
        <!--===============================================================================================-->
        < src="vendor/countdowntime/countdowntime.js"></>
        <!--===============================================================================================-->
        < src="js/loginjs/main.js"></>
    </body>

</html>