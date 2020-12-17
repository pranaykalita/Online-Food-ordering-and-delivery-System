<!DOCTYPE html>
<?php include "php/connection.php" ?>
<?php include "php/feedback.php" ?>
<html style="font-size: 16px;" lang="en-IN">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <title>CodersCafe</title>

        <link rel="stylesheet" href="css/style.css" media="screen">
        <link rel="stylesheet" href="css/testimonial.css" media="screen">

        <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script>
            //clear input field

            function clearfield() {
                setTimeout(function () {
                    document
                        .getElementById("contactform")
                        .reset();

                }, 2000)

            }
        </script>

    </head>

    <body
       
        class="u-body u-overlap u-overlap-transparent">

        <!-- header -->
        <?php include 'header.php' ?>
        <!-- end -->

        <!-- home section1 -->
        <section
            class="skrollable u-clearfix u-image u-parallax u-section-1"
            id="Home"
            data-image-width="1920"
            data-image-height="950">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-container-style u-group u-group-1">
                    <div
                        class="u-container-layout u-valign-bottom-xl u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-container-layout-1">
                        <p
                            class="u-align-center u-text u-text-custom-color-1 u-text-1"
                            data-animation-name="flipIn"
                            data-animation-duration="1000"
                            data-animation-delay="0"
                            data-animation-direction="X">Dinner With US
                            <span
                                class="typer"
                                id="some-id"
                                data-delay="200"
                                data-delim=":"
                                data-words="Friends:Family:Officemates:Pranay:Priyanshu"
                                data-colors="orange"></span>
                            <span class="cursor" data-cursordisplay="_" data-owner="some-id"></span>
                        </p>
                        <p
                            class="u-align-center u-custom-font u-font-montserrat u-text u-text-2"
                            data-animation-name="flipIn"
                            data-animation-duration="1000"
                            data-animation-delay="0"
                            data-animation-direction="X">
                            Let the taste of our dishes , reign your taste buds</p>
                        <a
                            href="#menu"
                            class="u-align-center-sm u-align-center-xs u-btn u-btn-round u-button-style u-custom-font u-gradient u-none u-radius-50 u-text-body-alt-color u-btn-1"
                            data-animation-name="fadeIn"
                            data-animation-duration="1000"
                            data-animation-delay="0"
                            data-animation-direction="">ORDER TODAY</a>
                        <!-- svg for scroll down -->
                        <span
                            class="u-icon u-icon-circle u-text-custom-color-2 u-icon-1 animated tada"
                            data-animation-name="flipIn"
                            data-animation-duration="1000"
                            data-animation-delay="0"
                            data-animation-direction="X"
                            data-href="#Aboutus"
                            data-page-id="234157864">

                            <svg
                                class="u-svg-link"
                                preserveaspectratio="xMidYMin slice"
                                viewbox="0 0 192.701 192.701">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2d60"></use>
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1"
                                xml:space="preserve"
                                class="u-svg-content"
                                viewbox="0 0 192.701 192.701"
                                x="0px"
                                y="0px"
                                id="svg-2d60"
                                style="enable-background:new 0 0 192.701 192.701;">
                                <g>
                                    <g id="Double_Chevron_Down">
                                        <path
                                            d="M171.955,88.526l-75.61,74.528l-75.61-74.54c-4.74-4.704-12.439-4.704-17.179,0c-4.74,4.704-4.74,12.319,0,17.011    l84.2,82.997c4.559,4.511,12.608,4.535,17.191,0l84.2-83.009c4.74-4.692,4.74-12.319,0-17.011    C184.394,83.823,176.695,83.823,171.955,88.526z"></path>
                                        <path
                                            d="M87.755,104.322c4.559,4.511,12.608,4.535,17.191,0l84.2-82.997c4.74-4.704,4.74-12.319,0-17.011    c-4.74-4.704-12.439-4.704-17.179,0L96.345,78.842L20.734,4.314c-4.74-4.704-12.439-4.704-17.179,0    c-4.74,4.704-4.74,12.319,0,17.011L87.755,104.322z"></path>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <!-- svg end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- home section 1 end -->

        <!-- home section 2 about-->
        <section class="u-clearfix u-white u-section-2" id="Aboutus">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div
                    class="u-clearfix u-expanded-width u-gutter-32 u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                                <div class="u-container-layout u-container-layout-1">
                                    <h1
                                        class="u-align-left u-custom-font u-font-montserrat u-text u-text-body-color u-title u-text-1">
                                        <span class="u-text-custom-color-1">
                                            <b>Coders</b>
                                        </span>
                                        <br>Cafe
                                    </h1>
                                    <p
                                        class="u-align-left u-custom-font u-font-montserrat u-text u-text-body-color u-text-2">
                                        The restaurant is an organic space reflective of nature inspired cuisine.The
                                        interplay of textures and colour brings life and a vibrance that embraces
                                        therestaurant’s place in the dress circle of Jorhat. An ode to the
                                        assam'slandscape, from the vast nature floor, to the cracked bark of a paperbark
                                        tree, every detail from the ground up has been thoughtfully considered.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="u-align-right u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <!-- svg blob -->
                                    <div class="u-shape u-shape-svg u-text-custom-color-1 u-shape-1">
                                        <svg class="u-svg-link" preserveaspectratio="none" viewbox="0 0 160 150">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-ed11"></use>
                                        </svg>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            version="1.1"
                                            xml:space="preserve"
                                            class="u-svg-content"
                                            viewbox="0 0 160 150"
                                            x="0px"
                                            y="0px"
                                            id="svg-ed11">
                                            <path
                                                d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
	c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
	c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
	C6.9,115.6,25.2,125.2,43.2,126.9z"></path>
                                        </svg>
                                    </div>
                                    <!-- svg blob end -->
                                    <div class="u-expand-resize u-image u-image-circle u-image-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home section 2 END -->

        <!-- home section 3 menu-->
        <section
            class="u-align-center u-clearfix u-image u-parallax u-shading u-section-3">
            <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-sheet-1">
                <h1
                    class="u-custom-font u-font-oswald u-text u-text-custom-color-1 u-text-1"
                    id="menu">Menu</h1>
                <!-- 4 list of menu -->
                <div class="u-list u-repeater u-list-1">
                    <!-- memu item 1 -->
                    <div
                        class="u-container-style u-list-item u-repeater-item u-white u-list-item-1"
                        data-animation-name="slideIn"
                        data-animation-duration="2000"
                        data-animation-delay="0"
                        data-animation-direction="Up">
                        <div class="u-container-layout u-similar-container u-container-layout-1">
                            <div
                                alt=""
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-expanded-width-xs u-image u-image-circle u-image-1"></div>
                            <div
                                class="u-container-style u-expanded-width-xs u-group u-video-cover u-group-1">
                                <div class="u-container-layout u-container-layout-2">
                                    <h3 class="u-custom-font u-font-oswald u-text u-text-2">APPETIZERS</h3>
                                    <a
                                        href="Menu.php#starter"
                                        class="u-btn u-btn-rectangle u-button-style u-custom-color-2 u-hover-custom-color-3 u-btn-1">
                                        BROWSE MENU<br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- memu item 2 -->
                    <div
                        class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-2"
                        data-animation-name="slideIn"
                        data-animation-duration="2000"
                        data-animation-delay="0"
                        data-animation-direction="Up">
                        <div class="u-container-layout u-similar-container u-container-layout-3">
                            <div
                                alt=""
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-expanded-width-xs u-image u-image-circle u-image-2"></div>
                            <div
                                class="u-align-left-xs u-container-style u-expanded-width-xs u-group u-video-cover u-group-2">
                                <div class="u-container-layout u-valign-middle-xs u-container-layout-4">
                                    <h3 class="u-custom-font u-font-oswald u-text u-text-default u-text-3">MAIN COURSE</h3>
                                    <a
                                        href="Menu.php#maincourse"
                                        class="u-btn u-btn-rectangle u-button-style u-custom-color-2 u-hover-custom-color-3 u-btn-2">
                                        BROWSE MENU<br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- memu item 3 -->
                    <div
                        class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-3"
                        data-animation-name="slideIn"
                        data-animation-duration="2000"
                        data-animation-delay="0"
                        data-animation-direction="Up">
                        <div class="u-container-layout u-similar-container u-container-layout-5">
                            <div
                                alt=""
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-expanded-width-xs u-image u-image-circle u-image-3"></div>
                            <div
                                class="u-container-style u-expanded-width-xs u-group u-video-cover u-group-3">
                                <div class="u-container-layout u-valign-middle-xs u-container-layout-6">
                                    <h3 class="u-custom-font u-font-oswald u-text u-text-default u-text-4">DESERT</h3>
                                    <a
                                        href="Menu.php#Deserts"
                                        class="u-btn u-btn-rectangle u-button-style u-custom-color-2 u-hover-custom-color-3 u-btn-3">
                                        BROWSE MENU</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- memu item 4 -->
                    <div
                        class="u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-4"
                        data-animation-name="slideIn"
                        data-animation-duration="2000"
                        data-animation-delay="0"
                        data-animation-direction="Up">
                        <div class="u-container-layout u-similar-container u-container-layout-7">
                            <div
                                alt=""
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-expanded-width-xs u-image u-image-circle u-image-4"></div>
                            <div
                                class="u-container-style u-expanded-width-xs u-group u-video-cover u-group-4">
                                <div class="u-container-layout u-valign-middle-xs u-container-layout-8">
                                    <h3 class="u-custom-font u-font-oswald u-text u-text-5">SALADS &amp; MOMOS</h3>
                                    <a
                                        href="Menu.php#salad"
                                        class="u-btn u-btn-rectangle u-button-style u-custom-color-2 u-hover-custom-color-3 u-btn-4">
                                        BROWSE MENU</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end items -->
                </div>
                <!-- 4 list menu end -->
            </div>
        </section>
        <!-- home section 3 END -->

        <!-- home section 4 testimonial -->
        <section
            id="testimonial"
            class="u-carousel u-slide u-valign-middle-xs u-block-25c9-1"
            data-u-ride="carousel"
            data-interval="5000">
            <ol class="u-absolute-hcenter u-carousel-indicators u-block-25c9-5">
                <li
                    data-u-target="#testimonial"
                    class="u-active u-grey-30 u-shape-rectangle"
                    data-u-slide-to="0"></li>
                <li
                    data-u-target="#testimonial"
                    class="u-grey-30 u-shape-rectangle"
                    data-u-slide-to="1"></li>
                <li
                    data-u-target="#testimonial"
                    class="u-grey-30 u-shape-rectangle"
                    data-u-slide-to="2"></li>
            </ol>
            <div class="u-carousel-inner" role="listbox">
                <div class="u-active u-align-center u-carousel-item u-clearfix u-section-4-1">
                    <div class="u-clearfix u-sheet u-sheet-1">
                        <h1 class="u-align-center u-custom-font u-font-montserrat u-text u-text-1">what  they say about us</h1>
                        <div
                            class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
                            <div class="u-layout">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-1">
                                        <div
                                            class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-valign-top-xl u-container-layout-1">
                                            <div
                                                alt=""
                                                class="u-align-left u-image u-image-circle u-image-1"
                                                data-image-width="720"
                                                data-image-height="1080"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-left-lg u-align-left-xl u-align-right-md u-align-right-sm u-align-right-xs u-container-style u-layout-cell u-right-cell u-shape-rectangle u-size-40 u-layout-cell-2">
                                        <div
                                            class="u-container-layout u-valign-top-sm u-valign-top-xs u-container-layout-2">
                                            <p
                                                class="u-align-left-md u-align-left-sm u-align-left-xs fontsett u-text u-text-2">Sample
                                                text. Click to select the text box. Click again or double click to start editing
                                                the text.</p>
                                            <h5 class="u-align-center-sm u-align-center-xs u-text u-text-3">Frank Kinney</h5>
                                            <h6 class="u-align-center-sm u-align-center-xs u-text u-text-4">Financial Director</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-2">
                            <div class="u-layout">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-3">
                                        <div
                                            class="u-container-layout u-valign-top-sm u-valign-top-xl u-valign-top-xs u-container-layout-3">
                                            <div
                                                alt=""
                                                class="u-align-left u-image u-image-circle u-image-2"
                                                data-image-width="720"
                                                data-image-height="1080"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-container-style u-layout-cell u-right-cell u-size-40 u-layout-cell-4">
                                        <div class="u-container-layout u-container-layout-4">
                                            <p class="u-text fontsett u-text-5">Sample text. Click to select the text box.
                                                Click again or double click to start editing the text.</p>
                                            <h5 class="u-align-center-sm u-align-right-md u-text u-text-6">Frank Kinney</h5>
                                            <h6 class="u-align-center-sm u-align-right-md u-text u-text-7">Financial Director</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="u-align-center u-carousel-item u-clearfix u-section-4-2">
                    <div class="u-clearfix u-sheet u-sheet-1">
                        <h1 class="u-align-center u-custom-font u-font-montserrat u-text u-text-1">what they say about us</h1>
                        <div
                            class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
                            <div class="u-layout">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-1">
                                        <div
                                            class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-valign-top-xl u-container-layout-1">
                                            <div
                                                alt=""
                                                class="u-align-left u-image u-image-circle u-image-1"
                                                data-image-width="720"
                                                data-image-height="1080"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-left-lg u-align-left-xl u-align-right-md u-align-right-sm u-align-right-xs u-container-style u-layout-cell u-right-cell u-shape-rectangle u-size-40 u-layout-cell-2">
                                        <div
                                            class="u-container-layout u-valign-top-sm u-valign-top-xs u-container-layout-2">
                                            <p
                                                class="u-align-left-md u-align-left-sm u-align-left-xs  fontsett u-text u-text-2">Sample
                                                text. Click to select the text box. Click again or double click to start editing
                                                the text.</p>
                                            <h5 class="u-align-center-sm u-align-center-xs u-text u-text-3">Frank Kinney</h5>
                                            <h6 class="u-align-center-sm u-align-center-xs u-text u-text-4">Financial Director</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-2">
                            <div class="u-layout">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-3">
                                        <div
                                            class="u-container-layout u-valign-top-sm u-valign-top-xl u-valign-top-xs u-container-layout-3">
                                            <div
                                                alt=""
                                                class="u-align-left u-image u-image-circle u-image-2"
                                                data-image-width="720"
                                                data-image-height="1080"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-container-style u-layout-cell u-right-cell u-size-40 u-layout-cell-4">
                                        <div class="u-container-layout u-container-layout-4">
                                            <p class="u-text u-text-5 fontsett">Sample text. Click to select the text box.
                                                Click again or double click to start editing the text.</p>
                                            <h5 class="u-align-center-sm u-align-right-md u-text u-text-6">Frank Kinney</h5>
                                            <h6 class="u-align-center-sm u-align-right-md u-text u-text-7">Financial Director</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="u-align-center u-carousel-item u-clearfix u-section-4-3">
                    <div class="u-clearfix u-sheet u-sheet-1">
                        <h1 class="u-align-center u-custom-font u-font-montserrat u-text u-text-1">what they say about us</h1>
                        <div
                            class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
                            <div class="u-layout">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-1">
                                        <div
                                            class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-valign-top-xl u-container-layout-1">
                                            <div
                                                alt=""
                                                class="u-align-left u-image u-image-circle u-image-1"
                                                data-image-width="720"
                                                data-image-height="1080"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-left-lg u-align-left-xl u-align-right-md u-align-right-sm u-align-right-xs u-container-style u-layout-cell u-right-cell u-shape-rectangle u-size-40 u-layout-cell-2">
                                        <div
                                            class="u-container-layout u-valign-top-sm u-valign-top-xs u-container-layout-2">
                                            <p
                                                class="u-align-left-md u-align-left-sm u-align-left-xsu-text fontsett fontsett u-text-2">Sample
                                                text. Click to select the text box. Click again or double click to start editing
                                                the text.</p>
                                            <h5 class="u-align-center-sm u-align-center-xs u-text u-text-3">Frank Kinney</h5>
                                            <h6 class="u-align-center-sm u-align-center-xs u-text u-text-4">Financial Director</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-gutter-4 u-layout-wrap u-layout-wrap-2">
                            <div class="u-layout">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-3">
                                        <div
                                            class="u-container-layout u-valign-top-sm u-valign-top-xl u-valign-top-xs u-container-layout-3">
                                            <div
                                                alt=""
                                                class="u-align-left u-image u-image-circle u-image-2"
                                                data-image-width="720"
                                                data-image-height="1080"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-container-style u-layout-cell u-right-cell u-size-40 u-layout-cell-4">
                                        <div class="u-container-layout u-container-layout-4">
                                            <p class="u-text fontsett u-text-5">Sample text. Click to select the text box.
                                                Click again or double click to start editing the text.</p>
                                            <h5 class="u-align-center-sm u-align-right-md u-text u-text-6">Frank Kinney</h5>
                                            <h6 class="u-align-center-sm u-align-right-md u-text u-text-7">Financial Director</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a
                class="u-carousel-control u-carousel-control-prev u-icon-circle u-text-palette-1-base u-block-25c9-3"
                href="#testimonial"
                role="button"
                data-u-slide="prev">
                <span aria-hidden="true">
                    <svg viewbox="0 0 477.175 477.175">
                        <path
                            d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
                    </svg>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a
                class="u-carousel-control u-carousel-control-next u-icon-circle u-text-palette-1-base u-block-25c9-4"
                href="#testimonial"
                role="button"
                data-u-slide="next">
                <span aria-hidden="true">
                    <svg viewbox="0 0 477.175 477.175">
                        <path
                            d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path>
                    </svg>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </section>
        <!-- end testimonial -->

        <!-- home section 5 contact-->
        <section
            class="u-clearfix u-image u-parallax u-shading u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-section-5"
            id="contactus">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div
                            class="u-align-center u-container-style u-custom-color-2 u-layout-cell u-left-cell u-size-28 u-layout-cell-1">
                            <div class="u-container-layout u-container-layout-1">
                                <h1 class="u-custom-font u-text u-text-1">Coders<br>cafe
                                </h1>
                                <a
                                    href="#Aboutus"
                                    data-page-id="234157864"
                                    class="u-border-2 u-border-white u-btn u-btn-rectangle u-button-style u-none u-btn-1">read more</a>
                            </div>
                        </div>
                        <div
                            class="u-align-center-lg u-align-center-md u-align-center-sm u-container-style u-layout-cell u-right-cell u-size-32 u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2">
                                <h1
                                    class="u-align-center-xl u-align-center-xs u-custom-font u-text u-text-default u-text-2">Contact Us
                                </h1>
                                <!-- social icons (svg) -->
                                <div class="u-social-icons u-spacing-20 u-social-icons-1">
                                    <a class="u-social-url" target="_blank" href="">
                                        <span
                                            class="u-icon u-icon-circle u-social-facebook u-social-type-logo u-icon-1">
                                            <svg
                                                class="u-svg-link"
                                                preserveaspectratio="xMidYMin slice"
                                                viewbox="0 0 112 112">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bdfb"></use>
                                            </svg>
                                            <svg x="0px" y="0px" viewbox="0 0 112 112" id="svg-bdfb" class="u-svg-content">
                                                <path
                                                    d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="u-social-url" target="_blank" href="">
                                        <span class="u-icon u-icon-circle u-social-twitter u-social-type-logo u-icon-2">
                                            <svg
                                                class="u-svg-link"
                                                preserveaspectratio="xMidYMin slice"
                                                viewbox="0 0 112 112">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b516"></use>
                                            </svg>
                                            <svg x="0px" y="0px" viewbox="0 0 112 112" id="svg-b516" class="u-svg-content">
                                                <path
                                                    d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="u-social-url" target="_blank" href="">
                                        <span
                                            class="u-icon u-icon-circle u-social-instagram u-social-type-logo u-icon-3">
                                            <svg
                                                class="u-svg-link"
                                                preserveaspectratio="xMidYMin slice"
                                                viewbox="0 0 112 112">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-d178"></use>
                                            </svg>
                                            <svg x="0px" y="0px" viewbox="0 0 112 112" id="svg-d178" class="u-svg-content">
                                                <path
                                                    d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                                                <path
                                                    d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                                                <path
                                                    d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <!-- end icons -->

                                <!-- contact form -->
                                <div class="u-form u-form-1">
                                    <form
                                        action=""
                                        method="POST"
                                        class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form"
                                        id="contactform"
                                        style="padding: 10px"
                                        source="custom"
                                        name="form">
                                        <div class="u-form-group u-form-name">
                                            <label for="name-0c28" class="u-form-control-hidden u-label">Name</label>
                                            <input
                                                type="text"
                                                placeholder="Enter your Name"
                                                id="name-0c28"
                                                name="name"
                                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"
                                                required=""
                                                value="">
                                        </div>
                                        <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-2">
                                            <label for="phone-deeb" class="u-form-control-hidden u-label">Phone</label>
                                            <input
                                                type="tel"
                                                pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                                placeholder="phone (e.g. +14155552675)"
                                                id="phone-deeb"
                                                name="phone"
                                                value=""
                                                required=""
                                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                                        </div>
                                        <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-3">
                                            <label for="email-d832" class="u-form-control-hidden u-label">Email</label>
                                            <input
                                                type="email"
                                                placeholder="Enter you email"
                                                id="email-d832"
                                                name="email"
                                                value=""
                                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                                        </div>
                                        <div class="u-form-group u-form-message">
                                            <label for="message-0c28" class="u-form-control-hidden u-label">Message</label>
                                            <textarea
                                                placeholder="Enter your message"
                                                rows="4"
                                                cols="50"
                                                id="message-0c28"
                                                name="message"
                                                value=""
                                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"
                                                required=""></textarea>
                                        </div>
                                        <div class="u-align-center u-form-group u-form-submit">
                                            <a
                                                class="u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-radius-19 u-btn-2">SEND</a>
                                            <input
                                                type="submit"
                                                value="submit"
                                                onclick="clearfield();"
                                                class="u-form-control-hidden">

                                        </div>
                                        <!-- message -->
                                        <div class="u-form-send-message u-form-send-success">
                                            Unable to send your message. Please try again.
                                        </div>
                                        <div class="u-form-send-error u-form-send-message">
                                            Thank you! Your message has been sent.
                                        </div>
                                        <!-- message end -->

                                    </form>
                                    <!-- form end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home section 5 END -->

        <!-- home section 6 -->
        <section class="u-align-center u-clearfix u-section-6" id="sec-1221">
            <div
                class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-sheet-1">
                <h1 class="u-text u-text-1">Let
                    <b>food</b>
                    be the medicine and medicine be the
                    <b>food</b>.
                </h1>
            </div>
        </section>
        <!-- home section 6 END -->

        <!-- include footer.html -->
        <?php include 'footer.php' ?>

        <!-- footer end -->

    </body>

</html>
<?php include "/php/message.php" ?>