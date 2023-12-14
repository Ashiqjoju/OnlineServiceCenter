<?php


$uniqueId = $_COOKIE['unique_id'];
include_once "php/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $pincode = $_POST["pincode"];
  

  echo $pincode;
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = " UPDATE Users SET pincode = '$pincode' where unique_id = '$uniqueId'";
 
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
    echo"no post";
}
?>
