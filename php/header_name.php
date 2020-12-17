<?php

session_start();
$user = 'LOGIN';

if(!isset($_SESSION['username'])){

    // set only login if sesson not valid

    $user = function(){
        ?>
<li class="u-nav-item">
    <a
        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
        href="login.php"
        style="padding: 10px 20px;">LOGIN</a>
</li>
<?php
    };

}
else{
    
    // set username after checking login and set drop down login
    
    $user = function(){
        ?>

<li class="u-nav-item">
    <a
        class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1"
        href="index.php"
        style="padding: 10px 20px;">
        <?php echo $_SESSION['username']; ?>
    </a>
    <div class="u-nav-popup">
        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
            <li class="u-nav-item">
                <a
                    class="u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-white"
                    href="php/logout.php">LOGOUT
                </a>
            </li>
        </div>
    </li>
    <?php
    };


}

?>