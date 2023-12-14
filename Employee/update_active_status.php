<?php
// Include your config file and establish the database connection
include_once "php/config.php";

// Get the new active status from the AJAX request
$newActiveStatus = $_POST['active'] ? 1 : 0;

// Update the active status in the database
$sql = "UPDATE emp_tech SET Active = $newActiveStatus WHERE id = 1"; // Replace with your query and condition
$result = mysqli_query($conn, $sql);

// Check if the update was successful
if ($result) {
  echo "Success"; // Send a success response back to the AJAX request
} else {
  echo "Error updating active status: " . mysqli_error($conn); // Send an error response back to the AJAX request
}

// Close the database connection
mysqli_close($conn);
?>
