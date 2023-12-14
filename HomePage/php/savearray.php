<?php
include_once "config.php";
$unique_id = $_COOKIE['unique_id'];
$sql2 = "SELECT file_name FROM text_files where unique_id='$unique_id' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql2);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['file_name'];
    echo $name;
  } 
$conn->close();
?>
