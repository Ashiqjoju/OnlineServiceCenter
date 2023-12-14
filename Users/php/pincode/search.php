<?php
include_once "php/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $pincode = $_POST["pincode"];
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT Pincode, OfficeName, District FROM pincodes WHERE Pincode = '$pincode'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<h3>Pincode: " . $row["Pincode"] . "</h3>";
      echo "<p>Office Name: " . $row["OfficeName"] . "</p>";
      echo "<p>District: " . $row["District"] . "</p>";
    }
  } else {
    $res = "null";
    echo $res;
  }
  $conn->close();
}
?>
