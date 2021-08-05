<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- php -->
    <?php
    include('include/dbcon.php');
    if(isset($_POST["resetpass"]))
    {
        $remail = $_POST["email"];
        $seqqes = $_POST["sqsn"]; 
        $seqans = $_POST["answer"]; 

        $query = "SELECT * FROM `users_tb` WHERE `umail` = '$remail' AND `sqsn` = '$seqqes' AND `sans` = '$seqans'";
        // echo $query;die();
        $data = $conn->query($query);
        $row = $data->fetch_assoc();
        if(mysqli_num_rows($data)>0)
        {
            $password = $row["upass"];
            $to_email = $remail;
            $html = file_get_contents('smstempalte.html');
            $html =  str_replace("{{PASSWORD}}",$password,$html);

            $subject = "Reset Password - FoodZilla";
            $headers = "From: FoodZilla\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1";

            // Send the email
            if(mail($to_email,$subject,$html,$headers))
            {
                echo '<script>swal("Password Recovered!", "check your email for password recovery", "success");</script>';
            }
            
            else
            
            {
                echo '<script>swal( "Oops" ,  "Email Doesnot exist!" ,  "error" )</script>';
            }
            
        }
        else{
            echo '<script>swal( "Oops" ,  "Email Doesnot exist or wrong Security Answer!" ,  "error" )</script>';
        }
    }
    ?>
    <!-- navbar -->
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
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Recover Your Account</h3>
                <p class="blue-text">Just answer a few questions so that we can verify its You.</p>
                <div class="card">
                    <form action="" method="POST" class="form-card">

                        <!-- email -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <input type="text" id="email" name="email" placeholder="Registered Email Address"  required>
                            </div>
                        </div>
                        
                        <!-- options -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">

                                <select class="form-control px-3" name="sqsn" id="" required>
                                    <option disable>Choose your Security Question</option>
                                    <option value="What is the name of the town where you were born?">What is the name of the town where you were born?</option>
                                    <option value="What was your first car?">What was your first car?</option>
                                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                </select>

                            </div>
                        </div>

                        <!-- answer -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <input type="text" id="sans" name="answer" placeholder="Security Answer" required>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> 
                                <button type="submit" name="resetpass" class="btn-block btn-primary">Reset Password</button> </div>
                           
                        </div>
                        <a href="login.php">Remember password?login now</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>