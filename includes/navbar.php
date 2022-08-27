<?php session_start(); ?>
<header>
    <nav class="nav">
        <ul class="nav-menu">
            <a href="index.php"><li class="nav-item">صفحه اصلی</li></a> 
            <a href="#"><li class="nav-item">درباره ما</li></a> 
            <?php 
                if(isset($_SESSION['state_login']) && $_SESSION['state_login'] ===true ) {
                    echo("<a href='#'><li class='nav-item'>". $_SESSION['fullname']. "</li></a>");
                    if(isset($_SESSION['role']) && $_SESSION['role'] == '1') {
                        echo("<a href='addLesson.php'><li class='nav-item'>"."افزودن درس". "</li></a>");
                    }
                }else {
                    echo("<a href='register.php'><li class='nav-item'>عضویت در سایت</li></a> ");
                }
            ?>
            <?php 
                if(isset($_SESSION['state_login']) && $_SESSION['state_login'] ===true ) {
                    echo("<a href='logout.php'><li class='nav-item'> خروج </li></a>");
                }else {
                    echo("<a href='login.php'><li class='nav-item'>ورود به سایت</li></a> ");
                }
            ?>
        </ul>        
    </nav>
</header>