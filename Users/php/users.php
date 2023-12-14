<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    // $sql ="SELECT DISTINCT emp_tech.* from emp_tech inner join messages on emp_tech.unique_id=messages.incoming_msg_id AND messages.outgoing_msg_id='$outgoing_id' order by messages.msg_id DESC";
    
    // $sql = "SELECT emp_tech.*, latest_message.msg
    // FROM emp_tech
    // INNER JOIN (
    //   SELECT incoming_msg_id, MAX(msg_id) AS latest_msg_id
    //   FROM messages
    //   WHERE outgoing_msg_id = '$outgoing_id'
    //   GROUP BY incoming_msg_id
    // ) AS latest ON emp_tech.unique_id = latest.incoming_msg_id
    // INNER JOIN messages AS latest_message ON latest.latest_msg_id = latest_message.msg_id
    // ORDER BY latest_message.msg_id DESC
    // ";
   
    $sql ="SELECT DISTINCT emp_tech.* from service_emp inner join  emp_tech ON emp_tech.unique_id=service_emp.emp_id WHERE service_emp.cust_id='$outgoing_id'" ;

    $sql10 = "SELECT DISTINCT service_center.* from service_center inner join messages on (service_center.unique_id=messages.incoming_msg_id or service_center.unique_id=messages.outgoing_msg_id) join users on (users.unique_id=messages.outgoing_msg_id or users.unique_id=messages.incoming_msg_id )where users.unique_id='$outgoing_id' order by messages.msg_id DESC";
    

    // $sql10="
    
    // SELECT service_center.*, latest_message.msg
    // FROM service_center
    // INNER JOIN (
    //   SELECT incoming_msg_id, MAX(msg_id) AS latest_msg_id
    //   FROM messages
    //   WHERE outgoing_msg_id = '$outgoing_id'
    //   GROUP BY incoming_msg_id
    // ) AS latest ON service_center.unique_id = latest.incoming_msg_id
    // INNER JOIN messages AS latest_message ON latest.latest_msg_id = latest_message.msg_id
    // ORDER BY latest_message.msg_id DESC
    
    // ";
 
    $query = mysqli_query($conn, $sql);
    $query10 = mysqli_query($conn, $sql10);
    $output = "";
    if( mysqli_num_rows($query10) == 0 && mysqli_num_rows($query)== 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query10) > 0){

        include_once "data.php";
    }
    elseif(mysqli_num_rows($query) >0)
    {

        include_once "data.php";
    }
    echo $output;
?>