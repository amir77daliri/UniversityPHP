<?php 
    session_start();
    if( isset($_POST['username']) && !empty($_POST['username']) &&
      isset($_POST['password']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
      }else {
        exit("نام کاربری یا گذرواژه اشتباه است. لطفا مجددا تلاش کنید...");
    }

    $link = mysqli_connect('localhost', 'root', '', 'Management');
    if(mysqli_connect_errno()) {
        exit("اتصال با خطا مواجه شد". mysqli_connect_error());
    }

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    if($row) {
        $_SESSION['state_login'] = true;
        $_SESSION['user_id'] = $row[0];
        $_SESSION['username'] = $row[1];
        $_SESSION['fullname'] = $row[2];
        $_SESSION['role'] = $row[5];
        echo($_SESSION['role'])
        ?>
        <script>
            location.replace('index.php');
        </script>
        <?php
    }else{
        echo("ورود موفقیت آمیز نبود...");
    }
    
?>