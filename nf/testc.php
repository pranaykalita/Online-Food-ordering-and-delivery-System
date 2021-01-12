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

       
        <!-- home section 6 -->
        <section class="u-align-center u-section-1 u-parallax" id="sec-1221">
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