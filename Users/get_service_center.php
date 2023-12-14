<?php
include_once "php/config.php";

$user_id = $_COOKIE['unique_id'];
$pincode = $_COOKIE['pincode'];
$main_device = $_COOKIE['clickedButtons'];
$decoded_main_device = json_decode($main_device, true);


$device = end($decoded_main_device);




if ($_SERVER["REQUEST_METHOD"] === "POST") {


  $sql = "SELECT * FROM service_center where device = '$device' ORDER BY RAND() LIMIT 1;";
  $result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

  $row = $result->fetch_assoc();
  


  $sql1 = "SELECT AVG(rating) AS avg_rating FROM service_servCenter WHERE serv_id = '" . $row['unique_id'] . "'";
$result1 = $conn->query($sql1);

if ($result1 && $result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $avgRating = $row1['avg_rating'];
} else {
    $avgRating = 0; 
    // If no results are found, set the average rating to a default value
}

$response = $row['unique_id'] . '|' . $row['fname'] . '|' . $row['device'] . '|' . $avgRating;
echo $response;

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
   

} 
else {
  
    echo "";
}

