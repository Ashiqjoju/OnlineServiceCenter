<?php

$serviceId = $_POST['service_id'];
$selectedStatus = $_POST['service_status'];
include_once "php/config.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the status based on the service ID
$sql = "UPDATE service_emp SET service_status = '$selectedStatus' WHERE service_id = '$serviceId'";

if ($conn->query($sql) === TRUE) {
    $response = "Status updated successfully";
    if($selectedStatus == "Service Completed"){

            $query = "SELECT emp_id FROM service_emp WHERE service_id = '$serviceId'";
            $result = $conn->query($query);

            // Check if the query was successful
            if ($result) {
            $row = $result->fetch_assoc();
            $id = $row['emp_id'];
            $sql3 ="UPDATE emp_tech SET s_count = s_count - 1 WHERE unique_id = $id";
            if ($conn->query($sql3) === TRUE){
          echo " Service list has been inserted";
        }
    }
    }

} else {
    // Update failed
    $response = "Error updating status: " . $conn->error;
}

$conn->close();

// Send the response back to the client
echo $response;

?>
