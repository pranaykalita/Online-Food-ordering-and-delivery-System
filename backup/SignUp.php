<!DOCTYPE html>
<?php include "php/connection.php" ?>


<html style="font-size: 16px;" lang="en-IN">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <title>SignUp</title>
        <link rel="stylesheet" href="css/static.css" media="screen">
        <link rel="stylesheet" href="css/SignUp.css" media="screen">
        <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
        
        
 
        <script class="u-script" type="text/javascript" src="js/static.js" defer=""></script>

        <meta name="generator" content="Coders Cafe , pranay ,ppd">

        <link
            id="u-theme-google-font"
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
        <link
            id="u-page-google-font"
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Lobster:400|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

    </head>

    <body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">

        <!-- header -->
        <?php include 'header.php' ?>
        <!-- end -->

        <!-- signup section -->
        <section
            class="u-clearfix u-image u-shading u-section-1"
            id="sec-864e"
            data-image-width="1600"
            data-image-height="1067">
            
            <div class="u-container-style u-expanded-width u-gradient u-group u-group-1">
                <div class="u-container-layout u-container-layout-1">
                    <div class="u-container-style u-expanded-width-xs u-gradient u-group u-group-2">
                        <div class="u-container-layout u-container-layout-2">
                            <h2 class="u-custom-font u-subtitle u-text u-text-custom-color-7 u-text-1">Sign up</h2>
                            
                            <p
                                class="u-custom-font u-small-text u-text u-text-default u-text-variant u-text-2">Create an account and start ordering</p>
                            
                               
                               
                            <div class="u-expanded-width-xs u-form u-form-1">
                                
                            <?php include 'php/register.php'?>
                                <!-- signup form -->
                                <form
                                    action=""
                                    method="POST"
                                    class="u-clearfix u-form-spacing-35 u-form-vertical u-inner-form"
                                    style="padding: 4px;"
                                    
                                    name="form">
                                    <p class="u-custom-font u-small-text u-text u-text-default u-text-variant u-text-2"><?php echo $msg; ?></p>
                                    <div class="u-form-group u-form-name u-form-group-1">
                                        <label for="name-3a45" class="u-form-control-hidden u-label">Name</label>
                                        <input
                                            type="text"
                                            placeholder="Enter your Name"
                                            id="name-3a45"
                                            name="name"
                                            class="u-border-1 u-border-custom-color-9 u-custom-font u-input u-input-rectangle u-radius-37 u-white u-input-1"
                                            
                                            autofocus="autofocus">
                                    </div>
                                    <div class="u-form-email u-form-group u-form-group-2">
                                        <label for="email-feef" class="u-form-control-hidden u-label">Email</label>
                                        <input
                                            type="email"
                                            placeholder="Enter a valid email address"
                                            id="email-feef"
                                            name="email"
                                            required=""
                                            class="u-border-1 u-border-custom-color-9 u-custom-font u-input u-input-rectangle u-radius-37 u-white u-input-2"
                                            >
                                    </div>
                                    <div class="u-form-group u-form-phone u-form-group-3">
                                        <label for="phone-97f8" class="u-form-control-hidden u-label">Phone</label>
                                        <input
                                            type="tel"
                                            pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                            placeholder="phone (e.g. +14155552675)"
                                            id="phone-97f8"
                                            name="phone"
                                            class="u-border-1 u-border-custom-color-9 u-custom-font u-input u-input-rectangle u-radius-37 u-white u-input-3"
                                            >
                                    </div>
                                    <div class="u-form-group u-form-group-4">
                                        <label for="text-ee57" class="u-form-control-hidden u-label"></label>
                                        <input
                                            type="password"
                                            placeholder="Password"
                                            id="text-ee57"
                                            name="passwd"
                                            required=""
                                            class="u-border-1 u-border-custom-color-9 u-custom-font u-input u-input-rectangle u-radius-37 u-white u-input-4"
                                          >
                                    </div>
                                    
                                    <div class="u-form-agree u-form-group u-form-group-5">
                                       
                                        <input
                                            type="checkbox"
                                            id="agree-4c37"
                                            name="agree"
                                            required=""
                                            class="u-agree-checkbox">
                                        <label for="agree-4c37" class="u-label">I accept the
                                            <a id="terms" href="#">Terms of Service</a>
                                        </label>
                                    </div>
                                    <div class="u-align-center u-form-group u-form-submit">
                                        <!-- <a type="submit"
                                            class="u-btn u-btn-submit u-button-style u-custom-color-9 u-custom-font u-hover-white u-text-custom-color-8 u-text-hover-black u-btn-1">Sign up</a> -->
                                        <input
                                            type="submit"
                                            value="submit"
                                            name="signup"
                                            class="u-btn u-btn-submit u-button-style u-custom-color-9 u-custom-font u-hover-white u-text-custom-color-8 u-text-hover-black u-btn-1"
                                          >
                                    </div>
                                   
                                </form>
                                <!-- signup form  -->


                            </div>
                            <p class="u-custom-font u-text u-text-custom-color-7 u-text-default u-text-3">
                                <a
                                    class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-hover-custom-color-7 u-text-palette-1-base u-btn-2"
                                    href="login.html">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end -->

        <!-- include footer.html -->
        <?php include 'footer.php' ?>

        <!-- footer end -->
    </body>

</html>

