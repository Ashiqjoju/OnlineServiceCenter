<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql ="SELECT DISTINCT emp_tech.* from emp_tech inner join messages on emp_tech.unique_id=messages.incoming_msg_id AND messages.outgoing_msg_id='$outgoing_id' WHERE  (fname LIKE '%{$searchTerm}%') order by messages.msg_id DESC";

   // $sql = "SELECT * FROM emp_tech WHERE  (gen_key LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>