<?php


$user_id = $_COOKIE['unique_id'];
$pincode = $_COOKIE['pincode'];
$main_device = $_COOKIE['clickedButtons'];
$decoded_main_device = json_decode($main_device, true);


$device = $decoded_main_device[0];
$device_sub = $decoded_main_device[1];

include_once "php/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT unique_id FROM emp_tech ORDER BY RAND() LIMIT 1;";
  $result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $emp_unique_id = $row["unique_id"];
  $sql1 = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('$emp_unique_id', '$user_id','8vqZynSoawKbs/bm3L+SAA==')";

  if ($conn->query($sql1) === TRUE) {
    echo "Message inserted successfully";
    $sql2 = "INSERT INTO service_emp (cust_id, emp_id, device,device_sub,pincode,service_status) VALUES ('$user_id','$emp_unique_id','$device','$device_sub','$pincode','Service Approved')";
    if ($conn->query($sql2) === TRUE) {
      echo " Service list has been inserted";

    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}


} 
else {
  
    echo "";
}

}