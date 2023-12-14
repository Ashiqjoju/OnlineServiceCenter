<?php
// include_once "php/config.php";

// $user_id = $_COOKIE['unique_id'];
// $pincode = $_COOKIE['pincode'];
// $main_device = $_COOKIE['clickedButtons'];
// $decoded_main_device = json_decode($main_device, true);


// $device = end($decoded_main_device);


// $timeSlot = $_POST['timeSlot'];


// if ($_SERVER["REQUEST_METHOD"] === "POST") {


//   $sql = "SELECT *
//           FROM emp_tech
//           WHERE device = '$device'
//           AND available_time LIKE '%$timeSlot%'
//           AND Active = 'on'
//           AND s_count < 3
//           ORDER BY RAND()
//           LIMIT 1";


//   $result = $conn->query($sql);

// if ($result && $result->num_rows > 0) {

//   $row = $result->fetch_assoc();
  


// $response = $row['unique_id'] . '|' . $row['fname'] . '|' . $row['device'] . '|' . $row['avg_rating'];
// echo $response;

// } else {
//     echo "null";
// }
   

// } 
// else {
  
//     echo "";
// }

?>
<?php
include_once "php/config.php";

$user_id = $_COOKIE['unique_id'];
$pincode = $_COOKIE['pincode'];
$main_device = $_COOKIE['clickedButtons'];
$decoded_main_device = json_decode($main_device, true);

$device = end($decoded_main_device);

$timeSlot = $_POST['timeSlot'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT *
            FROM emp_tech
            WHERE device = '$device'
            AND available_time LIKE '%$timeSlot%'
            AND Active = 'on'
            AND s_count < 3
            ORDER BY avg_rating DESC
            LIMIT 1"; // Fetching technician with max rating

    $result = $conn->query($sql);
    $maxTechnician = null;

    if ($result && $result->num_rows > 0) {
        $maxTechnician = $result->fetch_assoc();
    }

    $sql = "SELECT *
            FROM emp_tech
            WHERE device = '$device'
            AND available_time LIKE '%$timeSlot%'
            AND Active = 'on'
            AND s_count < 3
            ORDER BY avg_rating ASC
            LIMIT 1"; // Fetching technician with min rating

    $result = $conn->query($sql);
    $minTechnician = null;

    if ($result && $result->num_rows > 0) {
        $minTechnician = $result->fetch_assoc();
    }

    $sql = "SELECT *
            FROM emp_tech
            WHERE device = '$device'
            AND available_time LIKE '%$timeSlot%'
            AND Active = 'on'
            AND s_count < 3
            ORDER BY avg_rating DESC
            LIMIT 1 OFFSET 1"; // Fetching technician with medium rating

    $result = $conn->query($sql);
    $mediumTechnician = null;

    if ($result && $result->num_rows > 0) {
        $mediumTechnician = $result->fetch_assoc();
    }

    $technicians = array(
        'max' => $maxTechnician,
        'min' => $minTechnician,
        'medium' => $mediumTechnician
    );

    echo json_encode($technicians); // Encode the array as JSON
} else {
    echo "";
}
?>
