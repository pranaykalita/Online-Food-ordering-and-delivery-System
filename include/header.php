<!-- header -->
<?php
$count = 0;
if(isset($_SESSION['cart']))
{
    $count =  count($_SESSION['cart']);
}
?>
<style>
    .noboxshadow{
        box-shadow: none !important;
    }
</style>
<section class="header">
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top bg-dark ">
        <a class="navbar-brand text-light" href="/">Food Zila</a>
        <button class="navbar-toggler noboxshadow" type="button" data-toggle="collapse" data-target="#navbar_menus"
            aria-controls="navbar_menus" aria-expanded="true" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbar_menus">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link  text-light" href="/" data-scroll-to>Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link  text-light" href="index.php#about" data-scroll-to>About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link  text-light" href="" data-scroll-to id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item  text-light" href="index.php#menu">All Categories</a>
                        <?php
                        $cts = "SELECT * FROM `menucategory_tb` WHERE `cat_status` = '1'";
                        $data = $conn->query($cts);
                        while($row = $data->fetch_assoc()){
                            ?>
                        <a href="menu.php#<?php echo $row["cat_name"] ?>"
                            class="dropdown-item itmcat" ><?php echo $row["cat_name"] ?></a>
                        <?php
                        }
                        ?>

                    </div>

                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="index.php#contact" data-scroll-to>ContactUS</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto navbarright">
                <li class="nav-item ">

                    <?php
                if(!isset($_SESSION["username"]))
                {
                    echo '<a class="nav-link  text-light" href="account.php" data-scroll-to>Account</a>';
                }
                else
                {
                    echo '<a class="nav-link" href="account.php" data-scroll-to>'.$_SESSION["username"].'</a>';
                }
                ?>
                    <a class="nav-link  text-light" href="cart.php" data-scroll-to><i
                            class="fas fa-shopping-bag text-danger"></i>
                        Cart <?php echo $count; ?></a>
                </li>
                <?php
                if(!isset($_SESSION["username"]))
                {
                    echo ' <a href="login.php" class="btn btn-primary">Login</a>';
                }
                else
                {
                    
                    echo '<a href="logout.php" class="btn btn-primary">logout</a>';
                }
                ?>


            </ul>
        </div>
    </nav>
</section>