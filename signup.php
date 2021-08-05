<?php
define("TITLE" , "FOODZILLA");
include('include/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodzilla - Register Account</title>
    <link rel="stylesheet" href="userreg.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>

<body>
    <!-- registration -->
    <?php
    
    if(isset($_REQUEST["signup"])){

        $uname = $_REQUEST['uname'];
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $add = $_REQUEST['addr'];
        $sqsn = $_REQUEST['seqqsn'];
        $sans = $_REQUEST['seqanswer'];
        $pass = $_REQUEST['password'];

        $chk = "SELECT * FROM `users_tb` WHERE `uname` = '{$uname}' OR `umail` = '{$email}'";
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
        $sql = "INSERT INTO `users_tb`(`uname`, `Fname`, `Lname`, `umail`, `uphone`, `uadd`,`sqsn`,`sans`, `upass`)
                VALUES ('$uname','$fname','$lname','$email','$phone', '$add','$sqsn','$sans','$pass')";
             
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
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg p-4 navbar-dark bg-dark">
        <a class="navbar-brand font-weight-bold" href="/">FoodZilla</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#contact">ContactUS</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="images/about_dish.png" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>

            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="" method="POST">
                    <div class="row">

                        <!-- user Name -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="username" type="text" name="uname" placeholder="Username"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        <div class="input-group col-lg-12">
                            <span id="usermsg" class="mb-4"></span>
                        </div>

                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="firstName" type="text" name="fname" placeholder="First Name"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="lastName" type="text" name="lname" placeholder="Last Name"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address"
                                class="form-control bg-white border-left-0 border-md" required>

                        </div>
                        <div class="input-group col-lg-12">
                            <span id="Emailmsg" class="mb-4"></span>
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>

                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number(+911234567890)"
                                class="form-control bg-white border-md border-left-0 pl-3" required>
                        </div>

                        <!-- address  -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-home text-muted"></i>
                                </span>
                            </div>

                            <textarea id="addess" type="address" name="addr" placeholder="your Address"
                                class="form-control bg-white border-md border-left-0 pl-3" required></textarea>
                        </div>


                        <!-- security qyestion -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-question text-muted"></i>
                                </span>
                            </div>
                            <select id="job" name="seqqsn"
                                class="form-control custom-select bg-white border-left-0 border-md" required>
                                <option disable>Choose your Security Question</option>
                                <option value="What is the name of the town where you were born?">What is the name of
                                    the town where you were born?</option>
                                <option value="What was your first car?">What was your first car?</option>
                                <option value="What is your mother's maiden name?">What is your mother's maiden name?
                                </option>
                            </select>
                        </div>
                        <!-- Security andswer -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-shield text-muted"></i>
                                </span>
                            </div>

                            <input id="seqanswer" type="text" name="seqanswer" placeholder="Your Answer"
                                class="form-control bg-white border-md border-left-0 pl-3" required>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="re_password" type="text" name="re_password" placeholder="Confirm Password"
                                class="form-control bg-white border-left-0 border-md" required>

                        </div>
                        <div class="input-group col-lg-12">
                            <span id="passwordcnf" class="mb-4"></span>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">

                            <input type="submit" name="signup" class="btn btn-primary btn-block py-2">

                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <!-- Already Registered -->
                        <div class="text-center w-100">
                            <p class="text-muted font-weight-bold">Already Registered? <a href="login.php"
                                    class="text-primary ml-2">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        // For Demo Purpose [Changing input group text on focus]
        $(function () {
            $('input, select').on('focus', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
            });
            $('input, select').on('blur', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
            });
        });


        // check username availability

        $(document).ready(function () {
            $('#username').blur(function () {
                var username = $(this).val();
                $.ajax({
                    url: 'checkuser.php',
                    method: "POST",
                    data: {
                        user_name: username
                    },
                    success: function (data) {
                        if (data != '0') {
                            $('#usermsg').html(
                                '<span class="text-danger mb-3">Username Not available</span>'
                                );
                                $(":submit").attr("disabled", true);
                            // $('#submit').attr("disabled", true);
                        } else {
                            $('#usermsg').html(
                                '<span class="text-success mb-3">Username available</span>'
                                );
                                $(":submit").attr("disabled", false);
                            // $('#submit').attr("disabled", false);
                        }
                    }
                })
            })
        });

        // check email
        $(document).ready(function () {
            $('#email').blur(function () {
                var email = $(this).val();
                $.ajax({
                    url: 'checkuser.php',
                    method: "POST",
                    data: {
                        user_email: email
                    },
                    success: function (data) {
                        if (data != '0') {
                            $('#Emailmsg').html(
                                '<span class="text-danger">Email Alredy Registered</span>'
                                );
                                $(":submit").attr("disabled", true);

                        } else {
                            $('#Emailmsg').html(
                                '<span class="text-success">email available</span>');
                                $(":submit").attr("disabled", false);
                        }
                    }
                })
            })
        });

        // confirm password
        $(document).ready(function () {

            $('#re_password').keyup(function () {

                var pwd = $('#password').val();
                var cpwd = $('#re_password').val();
                if (cpwd != pwd) {
                    $('#passwordcnf').html('<span class="text-danger">Password Not Matching</span>');
                    $(":submit").attr("disabled", true);
                    return false;
                } else if (cpwd = pwd) {
                    $('#passwordcnf').html('');
                    $(":submit").attr("disabled", false);
                    return false;
                }

            });

        });
    </script>

</body>


</html>