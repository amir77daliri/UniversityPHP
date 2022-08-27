<?php  
    session_start();
    if( isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['fullname']) && !empty($_POST['fullname']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password']) ) {
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }else {
            exit("بعضی فیلدها مقدار دهی نشده اند...");
        }

        $link = mysqli_connect('localhost', 'root', '', 'Management');
        if(mysqli_connect_errno()){ ?>
            <script>
                window.alert("اتصال با خطا مواجه شد...!");
                location.replace('register.php');
            </script>
            <?php
        }

        $query = "SELECT * FROM user WHERE username='$username' OR email='$email'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        if($row) {
            ?>
            <script>
                alert("کاربری با این نام کاربری یا ایمیل از قبل موجود است! دوباره امتحان کنید.")
                location.replace('register.php');
            </script>
            <?php
        }else {
            $query = "INSERT INTO user (username, fullname, email, password, is_teacher) VALUES (
                '$username', '$fullname', '$email', '$password', '0'
            )";
            $result = mysqli_query($link, $query);
            ?>
            <script>
                alert("ثبت نام با موفقیت انجام شد...");
                location.replace('login.php');
            </script>
            <?php
        }




?>