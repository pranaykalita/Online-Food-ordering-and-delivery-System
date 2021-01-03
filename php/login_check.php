<?php 


if(isset($_POST['login']))
{




    $username = $_POST['username'];
    $pass = $_POST['pass'];

   $sql = "SELECT * FROM `users` WHERE email= '{$username}' AND password = '{$pass}' ";
    
    $data = mysqli_query($conn ,$sql);
    $res = mysqli_num_rows($data);


    if($res >0)
    {
        while($row = mysqli_fetch_assoc($data))
        {
            session_start();
            $_SESSION['username'] = $row['name'];
            $_SESSION['adminimg'] = $row['adminimg'];
            header("location: /index.php");
        }
    }
    
    else  
    {
        // return no username or password inccorect
        $msg = "no user found or check your password";
        
    }


}


?>