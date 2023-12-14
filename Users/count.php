<?php
include_once "php/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $device = $_POST["device"];


$query = "SELECT COUNT(*) AS online_count FROM emp_tech WHERE Active = 'on' and s_count<3 and device='$device'";
$result = $conn->query($query);
if ($result) {

    $row = $result->fetch_assoc();
    $onlineCount = $row['online_count'];
    echo $onlineCount;

  
}

}

?>
