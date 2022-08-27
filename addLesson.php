<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن درس</title>
</head>
<body>
    <?php include('includes/navbar.php') ?>
    <?php 
    if(isset($_SESSION['role']) && !empty($_SESSION['role']) && $_SESSION['role'] == '1'){

    }else{
         ?>
        <script>
            location.replace("index.php");
        </script>
        <?php
    }
    ?>

    <section class="section-container">
        <h2>اضافه کردن درس</h2>
        <hr>
        <div class="form-control">
            <form method="POST" action="action_addLesson.php"  enctype="multipart/form-data">
                <div class="form-container">
                    <div class="form-fields">
                        <div class="form-row">
                            <label for="l_name">نام درس <span>*</span> :</label>
                            <input type="text" id="l_name" name="l_name">
                        </div>
                        <div class="form-row">
                            <label for="u_name">نام استاد <span>*</span> :</label>
                            <input type="text" name="u_name" id="u_name" value="<?php echo($_SESSION['username'])?>" readonly>
                        </div>
                        <div class="form-row">
                            <label for="capacity"> ظرفیت <span>*</span> :</label>
                            <input type="number" name="capacity" id="capacity">
                        </div>
                        <div class="form-row">
                            <label for="image"> انتخاب تصویر <span>*</span> :</label>
                            <input type="file" name="image" id="image" style="height: 30px;" require>
                        </div>
                        <div class="submitButton form-row">
                        <button type="submit">  افزودن </button>
                    </div>
                    </div>
                </div>
            </form>
            <img src="images/add_lesson.jfif" alt="login" style="margin-right: 20px;">
        </div>
    </section>
    <?php include('includes/footer.php') ?>

</body>
</html>



