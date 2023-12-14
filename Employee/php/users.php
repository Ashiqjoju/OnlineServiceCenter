<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    
    $sql ="SELECT DISTINCT users.* from service_emp inner join  users ON users.unique_id=service_emp.cust_id WHERE service_emp.emp_id='$outgoing_id'" ;
   
//    $sql = "
   
//    SELECT users.*, latest_message.msg
//     FROM users
//     INNER JOIN (
//       SELECT incoming_msg_id, MAX(msg_id) AS latest_msg_id
//       FROM messages
//       WHERE incoming_msg_id = '$outgoing_id'
//       GROUP BY incoming_msg_id
//     ) AS latest ON users.unique_id = latest.incoming_msg_id
//     INNER JOIN messages AS latest_message ON latest.latest_msg_id = latest_message.msg_id
//     ORDER BY latest_message.msg_id DESC
   
//    ";
   
   $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>