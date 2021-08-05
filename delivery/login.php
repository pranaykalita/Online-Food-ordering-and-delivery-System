<?php include("./common/database.php"); 
// start login

if(isset($_POST["dloginbtn"]))
{
 $email = $_POST["demail"];   
 $password = $_POST["dpass"];   

 $sql = "SELECT `id`,`del_name` FROM `delivery_tb` WHERE `delemail` = '{$email}' AND `delpass` = '{$password}'";
 
 $res = $conn->query($sql);

 if(mysqli_num_rows($res) > 0 )
 {
     while($row = $res->fetch_assoc())
     {
         session_start();
         $_SESSION["deliveryid"] = $row["id"];
         $_SESSION["delname"] = $row["del_name"];

         header("LOCATION: index.php");
     }
 }
 else
 {
     echo '<script>alert("Wrong Email or Password")</script>';
 }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Delivery Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="demail" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="dpass" placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" name="dloginbtn" class="btn btn-primary" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
