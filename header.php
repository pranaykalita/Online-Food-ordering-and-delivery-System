<!-- for header and footer-->
<link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/static.css" media="screen">
<script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
<script class="u-script" type="text/javascript" src="js/static.js" defer=""></script>
<!-- end -->
<?php include 'php/connection.php' ?>
<?php include 'php/header_name.php' ?>

        <header
            class="u-clearfix u-header u-grey-70 u-sticky u-header headsc"
            id="sec-c3d4">
            <div class="u-clearfix u-sheet u-sheet-1">
                <a href="/" class="u-image u-logo u-image-1">
                    <img
                        src="images/logoNew.png"
                        class="u-logo-image u-logo-image-1"
                        data-image-width="145"></a>
                    <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                        <div
                            class="menu-collapse u-custom-font"
                            style="font-size: 1rem; letter-spacing: 0px; font-family: Poppins;">
                            <a
                                class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                href="#">
                                <svg>
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                                </svg>
                                <svg
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <symbol
                                            id="menu-hamburger"
                                            viewbox="0 0 16 16"
                                            style="width: 16px; height: 16px;">
                                            <rect y="1" width="16" height="2"></rect>
                                            <rect y="7" width="16" height="2"></rect>
                                            <rect y="13" width="16" height="2"></rect>
                                        </symbol>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="u-custom-menu u-nav-container">
                            <ul class="u-custom-font u-nav u-unstyled u-nav-1">
                                <li class="u-nav-item">
                                    <a
                                        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                        href="/"
                                        style="padding: 10px 20px;">HOME</a>
                                </li>
                                <li class="u-nav-item">
                                    <a
                                        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                        href="index.php#Aboutus"
                                        style="padding: 10px 20px;">ABOUTUS</a>
                                </li>
                                <li class="u-nav-item">
                                    <a
                                        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                        href="index.php#menu"
                                        style="padding: 10px 20px;">
                                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                                        MENU</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                            <li class="u-nav-item">
                                                <a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-white"
                                                    href="menu.php#starters">STARTERS</a>
                                            </li>
                                            <li class="u-nav-item">
                                                <a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-white"
                                                    href="menu.php#salad">SALADS</a>
                                            </li>
                                            <li class="u-nav-item">
                                                <a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-white"
                                                    href="menu.php#maincourse">MAINCOURSE</a>
                                            </li>
                                            <li class="u-nav-item">
                                                <a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-white"
                                                    href="menu.php#Deserts">DESERTS</a>
                                            </li>
                                            <li class="u-nav-item">
                                                <a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-white"
                                                    href="menu.php">Browse All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="u-nav-item">
                                    <a
                                        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                        href="index.php#contactus"
                                        style="padding: 10px 20px;">CONTACT US</a>
                                </li>
                                <li class="u-nav-item">
                                    <a
                                        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                        href="cart.php"
                                        style="padding: 10px 20px;">
                                        <i class="fa fa-shopping-cart"></i>
                                        CART</a>
                                </li>
                                <?php $user(); ?>
                                <!-- <li class="u-nav-item">
                                    <a
                                        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                        href="login.php"
                                        style="padding: 10px 20px;"></a>
                                </li> -->


                            </ul>
                        </div>

                        <!-- colapse menu -->
                        <div class="u-custom-menu u-nav-container-collapse">
                            <div
                                class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                                <div class="u-sidenav-overflow">
                                    <div class="u-menu-close"></div>
                                    <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                                        <li class="u-nav-item">
                                            <a class="u-button-style u-nav-link" href="/" style="padding: 10px 20px;">HOME</a>
                                        </li>
                                        <li class="u-nav-item">
                                            <a
                                                class="u-button-style u-nav-link"
                                                href="index.php#Aboutu"
                                                style="padding: 10px 20px;">ABOUTUS</a>
                                        </li>
                                        <li class="u-nav-item">
                                            <a
                                                class="u-button-style u-nav-link"
                                                href="index.php#menu"
                                                style="padding: 10px 20px;">
                                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                MENU</a>
                                            <div class="u-nav-popup">
                                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                                                    <li class="u-nav-item">
                                                        <a
                                                            class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                                            href="menu.php#starters">STARTERS</a>
                                                    </li>
                                                    <li class="u-nav-item">
                                                        <a
                                                            class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                                            href="menu.php#salad">SALADS</a>
                                                    </li>
                                                    <li class="u-nav-item">
                                                        <a
                                                            class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                                            href="menu.php#maincourse">MAINCOURSE</a>
                                                    </li>
                                                    <li class="u-nav-item">
                                                        <a
                                                            class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
                                                            href="menu.php#deserts">DESERTS</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="u-nav-item">
                                            <a class="u-button-style u-nav-link" href="#" style="padding: 10px 20px;">CONTACT US</a>
                                        </li>
                                        <li class="u-nav-item">
                                            <a
                                                class="u-button-style u-nav-link"
                                                href="cart.php"
                                                style="padding: 10px 20px;">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                CART</a>
                                        </li>
                                        <?php $user(); ?>
                                        <!-- <li class="u-nav-item">
                                            <a
                                                class="u-button-style u-nav-link"
                                                href="login.php"
                                                style="padding: 10px 20px;">LOGIN</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                        </div>
                    </nav>
                </div>
            </header>