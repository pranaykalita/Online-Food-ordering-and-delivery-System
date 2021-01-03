<!DOCTYPE html>
<?php
include ('../php/connection.php');

$msg = '';

if(isset($_POST['login']))
{
  $un = $_POST['username'];
  $pass = $_POST['password'];

  if( $un == '' || $pass == ''){
    $msg = 'fill all blanks';
  }
  else{
    $sql = "SELECT * FROM `admin` WHERE username= '{$un}' AND password = '{$pass}' ";
    
    $data = mysqli_query($conn ,$sql);
    $res = mysqli_num_rows($data);
    
    if($res >0)
    {
        while($row = mysqli_fetch_assoc($data))
        {
            session_start();
            $_SESSION['uname'] = $row['username'];
            $_SESSION['adimg'] = $row['image'];
            header("location: index.php");
        }
    }
    
    else  
    {
        // return no username or password inccorect
        $msg = "no user found or check your password";
        
    }
    
  }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body>
   

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../images/logonew.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
    
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <div class="underlineHover" > <?php echo $msg;?></div>
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>