
<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '', 'management');

    if(mysqli_connect_errno()){
        exit("اتصال برقرار نشد ...");
    }
    $user_id = $_SESSION['user_id'];
    $id = $_GET['id'];
    $query = "SELECT * FROM lesson WHERE l_id='$id' ";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $capacity = $row['capacity'];

?>
<?php 
    if(isset($_GET['action']) && !empty($_GET['action'])) {
        
	
        switch ($_GET['action']) {
            case 'DELETE':
                $query = "DELETE FROM user_lesson WHERE user_fk='$user_id' AND lesson_fk='$id'";
                $result = mysqli_query($link, $query);
                if($result === true){
                    $capacity += 1;
                    $query = "UPDATE lesson SET capacity='$capacity' WHERE l_id='$id' ";
                    ?>
                    <script>
                        alert("درس مورد نظر با موفقیت حذف شد...");
                        location.replace("index.php");
                    </script>
                    <?php
                    exit();
                }else{
                    ?>
                    <script>
                        alert("عملیات مورد نظر انجام نشد...");
                        location.replace("index.php");
                    </script>
                    <?php
                    exit();
                } break;
            case 'ADD':
                if($capacity > 0) {
                    $query = "INSERT INTO user_lesson (user_fk, lesson_fk) VALUES ('$user_id', '$id')";
                    $result = mysqli_query($link, $query);
                    if($result === true) {
                        $capacity -= 1;
                        $quer = "UPDATE lesson SET capacity='$capacity' WHERE l_id='$id' ";
                        $res = mysqli_query($link, $quer);
                        ?> 
                        <script>
                            alert("درس مورد نظر با موفقیت اضافه شد...");
                            location.replace("index.php");
                        </script>
                        <?php
                        exit();
                    }else{
                        ?>
                        <script>
                            alert("خطایی در ذخیره درس رخ داد!دوباره امتحان کنید.");
                            location.replace("index.php");
                        </script>
                        <?php
                        exit();
                    }
                }else {
                    ?>
                    <script>
                        alert("درس مورد نظر ظرفیت کافی ندارد...");
                        location.replace("index.php");
                    </script>
                    <?php
                    exit();
                }
                break;
                
        }
    }
?>