<!DOCTYPE html>
<html dir="rtl">
    <head></head>
    <body>
    <?php 
    if( isset($_POST['l_name'])   && !empty($_POST['l_name']) &&
        isset($_POST['u_name'])   && !empty($_POST['u_name']) &&
        isset($_POST['capacity']) && !empty($_POST['capacity'])) 
        {
            $l_name = $_POST['l_name'];
            $u_name = $_POST['u_name'];
            $capacity = $_POST['capacity'];
            $l_img = basename($_FILES["image"]["name"]);
        }
    
        $target_dir = "images/lessons/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
        
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
            ?>
            <script>
                alert("پرونده انتخاب شده یک تصویر نیست.");
                location.replace("addLesson.php");
            </script>
            <?php
            exit();
        }
        
        if (file_exists($target_file)) {
            $uploadOk = 0;
            ?>
            <script>
                alert("پرونده ای با همین نام از قبل موجود است! ...");
                location.replace("addLesson.php");
            </script>
            <?php
            exit();
        }
        
        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
            ?>
            <script>
                alert("اندازه پرونده انتخابی بیشتر از 500 کیلوبایت است");
                location.replace("addLesson.php");
            </script>
            <?php
            exit();
        }
        
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
            "jpeg" && $imageFileType != "gif" && $imageFileType !== "jfif") {
                $uploadOk = 0;
                ?>
                <script>
                alert("فقط پسوندهای JPG, JPEG, PNG & GIF برای پرونده مجاز هستند ");
                location.replace("addLesson.php");
                </script>
                <?php
                exit();
        }
        
        if ($uploadOk == 0) {
            echo "پرونده انتخاب شده به سرویس دهنده میزبان ارسال نشد <br />";
            echo("<button ><a href='addLesson.php'>بازگشت</a></button>");
            exit();
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            } else {
                echo "خطا در ارسال پرونده به سرویس دهنده میزبان رخ داده است <br />";
                exit();
            }
        }

        $link = mysqli_connect('localhost', 'root', '', 'management');
        if(mysqli_connect_errno()){
            exit("خطای اتصال به پایگاه داده! لطفا مجددا تلاش کنید...");
        }
        $query = "SELECT * FROM lesson WHERE teacher='$u_name' AND name='$l_name' ";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if($row) {
            ?>
            <script>
                alert("شما از قبل این درس را ثبت کرده اید ! درس دیگری وارد کنید...");
                location.replace("addLesson.php");
            </script>
            <?php
            exit();
        }
        $query = "INSERT INTO lesson (name, teacher, capacity, img_url) VALUES('$l_name', '$u_name', '$capacity', '$l_img')";
        $result = mysqli_query($link, $query);
        if($result === true){
            ?>
            <script>
                alert("درس مورد نظر با موفقیت ثبت شد.");
                location.replace("addLesson.php");
            </script>
            <?php
            exit();
        }else {
            echo("خطا در ثبت درس ...");
        }
    
    
?>
    </body>
</html>