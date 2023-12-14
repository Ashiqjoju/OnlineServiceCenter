<?php
// Include your config file and establish the database connection
include_once "php/config.php";


// Retrieve the active status from the database
$sql = "SELECT Active FROM emp_tech WHERE id = 1"; // Replace with your query and condition
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $activeStatus = $row['Active'];
  echo $activeStatus; // Send the active status as the response
} else {
  echo "Error retrieving active status: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
