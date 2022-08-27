<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سایت</title>
</head>
<body>
    <?php include('includes/navbar.php') ?>
    <section class="section-container">
        <h2>ورود به سایت</h2>
        <hr>
        <div class="form-control">
            <form method="POST" action="action_login.php">
                <div class="form-container">
                    <div class="form-fields">
                        <div class="form-row">
                            <label for="username">نام کاربری <span>*</span> :</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="form-row">
                            <label for="password">رمز عبور <span>*</span> :</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="submitButton form-row">
                        <button type="submit">ورود به سایت</button>
                    </div>
                    </div>
                </div>
            </form>
            <img src="images/login.jfif" alt="login">
        </div>
    </section>
    <?php include('includes/footer.php') ?>
</body>
</html>



