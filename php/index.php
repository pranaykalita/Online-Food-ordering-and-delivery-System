<!DOCTYPE html>
<?php include 'register.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $msg; ?></p>
    <form action="" method="POST">
        <input type="text" name="email" id="email">
        <input type="submit" value="submit">
    </form>
    
</body>
</html>