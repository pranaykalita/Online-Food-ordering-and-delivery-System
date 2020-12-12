<!DOCTYPE html>
<html style="font-size: 16px;" lang="en-IN">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <title>Login</title>
        <link rel="stylesheet" href="css/static.css" media="screen">
        <link rel="stylesheet" href="css/Login.css" media="screen">

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

        <!-- section for login -->
        <section
            class="u-clearfix u-image u-shading u-valign-middle u-section-1"
            id="sec-d1cf"
            data-image-width="1600"
            data-image-height="1067">
            <div class="u-container-style u-expanded-width u-gradient u-group u-group-1">
                <div class="u-container-layout u-container-layout-1">
                    <div class="u-container-style u-expanded-width-xs u-gradient u-group u-group-2">
                        <div class="u-container-layout u-container-layout-2" id="login">
                            <h2
                                class="u-custom-font u-subtitle u-text u-text-custom-color-7 u-text-default u-text-1">Sign in</h2>
                            <p
                                class="u-custom-font u-small-text u-text u-text-default u-text-variant u-text-2">Hello there! sign in and start enjoying our Delicious Foods</p>
                            <div class="u-form u-form-1">
                                <!-- login form -->
                                <form
                                    action="#"
                                    method="POST"
                                    class="u-clearfix u-form-spacing-35 u-form-vertical u-inner-form"
                                    style="padding: 30px;"
                                    source="custom"
                                    name="form">
                                    <div class="u-form-email u-form-group">
                                        <label for="name-0e71" class="u-form-control-hidden u-label"></label>
                                        <input
                                            type="email"
                                            placeholder="Email"
                                            id="name-0e71"
                                            name="username"
                                            class="u-border-1 u-border-custom-color-9 u-input u-input-rectangle u-radius-44"
                                            required="required"
                                            autofocus="autofocus">
                                    </div>
                                    <div class="u-form-email u-form-group">
                                        <label for="email-0e71" class="u-form-control-hidden u-label">Email</label>
                                        <input
                                            type="email"
                                            placeholder="password"
                                            id="email-0e71"
                                            name="email"
                                            class="u-border-1 u-border-custom-color-9 u-input u-input-rectangle u-radius-44"
                                            required="">
                                    </div>
                                    <div class="u-align-center u-form-group u-form-submit">
                                        <a
                                            href="#"
                                            class="u-btn u-btn-submit u-button-style u-custom-color-9 u-custom-font u-hover-white u-text-custom-color-8 u-text-hover-black u-btn-1">Sign in</a>
                                        <input type="submit" value="submit" class="u-form-control-hidden">
                                    </div>
                                    <!-- result message -->
                                    <div class="u-form-send-message u-form-send-success">Succesfull</div>
                                    <div class="u-form-send-error u-form-send-message">Wrong Username/Password</div>
                                    <!-- end -->
                                </form>
                            </div>
                            <!-- login form end -->
                            <a href="/SignUp.php">
                                <p class="u-custom-font u-text u-text-custom-color-7 u-text-default u-text-3">Sign up
                                </p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end -->

        <!-- include footer.html -->
        <div id="footer"></div>

        <!-- include footer.html -->
        <?php include 'footer.php' ?>

        <!-- footer end -->
    </body>

</html>