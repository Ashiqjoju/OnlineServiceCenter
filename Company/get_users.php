<?php
  session_start();
  include_once "config.php";
  $uid=$_SESSION['unique_id'];


  $sql ="SELECT DISTINCT users.* from  service_servcenter inner join users ON users.unique_id=service_servcenter.cust_id WHERE service_servcenter.serv_id='$uid'" ;
  $result = $conn->query($sql);

// Fetch data and store it in an array
$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}


// Send JSON response
header('Content-Type: application/json');
echo json_encode($users);
?>

