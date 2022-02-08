<?php
session_start();
include "connection.php";

if (isset($_SESSION["USER_ID"])){

    if (isset($_POST['result'])){


        $user_id = $_SESSION['USER_ID'];
        $gender = $_POST['gender'];
        $weight = $_POST['weight'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $activity= $_POST['activity'];
        $level = $_POST['level'];

        $sql = "INSERT INTO USER_DATA(USER_ID, GENDER, WEIGHT, AGE, HEIGHT, ACTIVITY, LEVEL_PA) 
        VALUES ('$user_id', '$gender', '$weight','$age', '$height', '$activity', '$level');";

        $res = mysqli_query($conn,$sql);

        if($res){
            ?>

            <script>
                alert("Data inserted successfully");

            </script>
            <?php
            header("location: result.php");

        }else{
            ?>
            <script>
                alert("Data not inserted ");
            </script>
            <?php
            header("location: mainpage.php");
        }   }
}
?>




