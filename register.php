<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام  </title>
</head>
<body>
    <?php include('includes/navbar.php') ?>
    <section class="section-container">
        <h2>ثبت نام در سایت</h2>
        <hr>
        <div class="form-control">
            <form method="POST" action="action_register.php" id="form">
                <div class="form-container">
                    <div class="form-fields">
                        <div class="form-row">
                            <label for="username">نام کاربری <span>*</span> :</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="form-row">
                            <label for="fullname">نام کامل <span>*</span> :</label>
                            <input type="text" name="fullname" id="fullname">
                        </div>
                        <div class="form-row">
                            <label for="email"> ایمیل <span>*</span> :</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="form-row">
                            <label for="password">رمز عبور <span>*</span> :</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="form-row">
                            <label for="re_password"> تکرار رمز عبور <span>*</span> :</label>
                            <input type="password" name="re_password" id="re_password">
                        </div>

                        <div class="submitButton form-row">
                        <button type="submit"> ثبت نام </button>
                    </div>
                    </div>
                </div>
            </form>
            <img src="images/register.jfif" alt="login">
        </div>
    </section>
    <?php include('includes/footer.php') ?>


    <script>
        let pass1 = document.getElementById('password');
        let pass2 = document.getElementById('re_password');
        let form = document.getElementById('form');

        form.addEventListener('submit', e => {
            e.preventDefault();
            if(pass2.value !== pass1.value) alert('رمزهای عبور مغایرت دارند!');
            else e.target.submit();
        })
    </script>
</body>
</html>



