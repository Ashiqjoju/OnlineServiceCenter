<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE service_center SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../../../Miniproject/Home/login.php");
            }
        }else{
            header("location: ../service_center.php");
        }
    }else{  
        header("location: ../../../Miniproject/Home/login.php");
    }
?>
<img src="" alt="">