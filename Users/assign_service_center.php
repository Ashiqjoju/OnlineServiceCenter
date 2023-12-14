<?php 


$user_id = $_COOKIE['unique_id'];
$pincode = $_COOKIE['pincode'];
$main_device = $_COOKIE['clickedButtons'];
$decoded_main_device = json_decode($main_device, true);
$device = end($decoded_main_device);

include_once "php/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["unique_id"])) {
      $centerId = $_POST["unique_id"];


      $sql1 = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('$user_id', '$centerId','Hey, Thank you for assigning me.')";
      if ($conn->query($sql1) === TRUE) {
        echo "Message inserted successfully";
        $sql2 = "INSERT INTO service_servcenter (cust_id, serv_id, device,pincode,service_status) VALUES ('$user_id','$centerId','$device','$pincode','Service Approved')";
        if ($conn->query($sql2) === TRUE) {
          echo " Service list has been inserted";
    
        }


    } else {
      echo "Error: Missing unique_id parameter";
    }
  } else {
    echo "Error: Invalid request method";
  }
}
  

?>