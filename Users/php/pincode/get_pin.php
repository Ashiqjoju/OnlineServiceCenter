<?php


$uniqueId = $_COOKIE['unique_id'];
include_once "php/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
$sql = "SELECT pincode FROM users where unique_id = '$uniqueId'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $pincode = $row["pincode"];
  echo $pincode;
} else {
  
    echo "";
}

  $conn->close();
}
?>
