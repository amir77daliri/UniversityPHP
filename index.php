<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>مدیریت  دروس</title>
</head>
<body>
<?php include('includes/navbar.php') ?>
    <?php 
        $link = mysqli_connect('localhost', 'root', '', 'management');
        if(mysqli_connect_errno()) {
            exit("اتصال با پایگاه داده برقرار نشد ...");
        }

        if(isset($_GET['filter']) && $_GET['filter'] === 'MINE') {
            $filter = $_GET['filter'];
            $user_id = $_SESSION['user_id'];
            $role = $_SESSION['role'];
            if($role == '0'){
                $query = "SELECT * FROM lesson WHERE l_id in (SELECT lesson_fk FROM user_lesson where user_fk='$user_id')";
            }else{
                $teacherName = $_SESSION['username'];
                $query = "SELECT * FROM lesson WHERE teacher='$teacherName'";
            }
            $result = mysqli_query($link, $query);
            
        }else{
            $query = "SELECT * FROM lesson ";
            $result = mysqli_query($link, $query);
        }

        if(isset($_GET['search'])) {
            $key = $_GET['search'];
            $pattern = "%$key%";
            $query = "SELECT * FROM lesson WHERE name LIKE '$pattern'";
            $result = mysqli_query($link, $query);
        }
    ?>

    <section class="section-container">
        <h2>لیست دروس</h2>
        <hr>
        <?php 
            if(isset($_SESSION['state_login']) && $_SESSION['state_login']=== true) {
                ?>
                        <div class="menu">
                            <div class="menu-item">
                                <form action="index.php" method="GET">
                                <label for="filter">فیلتر بر اساس :</label>
                                <select name="filter" id="" title="فیلتر بر اساس...">
                                    <option value="ALL">همه دروس</option>
                                    <option value="MINE">درس های من</option>
                                </select>
                                <button type="submit">فیلتر</button>
                                </form>
                            </div>
                            <div class="menu-item">
                                <form action="index.php" method="GET">
                                    <input type="text" placeholder="نام درس را وارد کنید" id="searchInput" name="search">
                                    <button type="submit">جستجو</button>
                                </form>   
                            </div>          
                        </div>
                        <hr style="background-color: red; height:2px"/>
                        <?php 
            }
        ?>
        <div class="card-container">
            <?php 
                while($row = mysqli_fetch_array($result)){
                    ?>
                <div class="card-item">
                    <img src="images/lessons/<?php echo ($row['img_url']) ?>" alt="">
                    <h3>نام درس :<?php echo($row['name'])?></h3>
                    <h4>استاد <?php echo($row['teacher'])?></h4>
                    <p>ظرفیت :<?php echo($row['capacity'])?></p>
                    <?php 
                        if(isset($_SESSION['state_login']) && $_SESSION['state_login']===true) {
                            if(isset($_SESSION['role']) && $_SESSION['role'] == '0') {
                                $user_id = $_SESSION['user_id'];
                                $lesson_id = $row['l_id'];
                                $query = "SELECT * FROM user_lesson WHERE user_fk='$user_id' AND lesson_fk='$lesson_id'";
                                $res = mysqli_query($link, $query);
                                $data = mysqli_fetch_array($res);                            
                                if($data) {
                                    ?>
                                    <button><a href="manage_lesson.php?id=<?php echo ($row[0]) ?>&action=DELETE" style="text-decoration: none;color:red">حذف</a></button>
                                    <?php
                                }else{
                                    ?>
                                    <button><a href="manage_lesson.php?id=<?php echo ($row[0]) ?>&action=ADD" style="text-decoration: none; color:darkgreen">افزودن</a></button>
                                    <?php
                                }
                            }
                        }
                    ?>
                </div>
                <?php
                }
            ?>
        </div>
    </section>

    <?php include('includes/footer.php') ?>

    <script>
        let searchInput = document.getElementById('searchInput');
        searchInput.onfocus = function() {
            searchInput.style.backgroundColor = '#cef7f8'
        }
        searchInput.onblur = function () {
            searchInput.style.backgroundColor = 'white'
        }
    </script>

</body>
</html>