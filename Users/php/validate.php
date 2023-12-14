<?php
include_once "config.php";
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to check the credentials
$stmt = $conn->prepare("SELECT email FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);

// Execute the query
$stmt->execute();

// Fetch the result
$stmt->store_result();
$num_rows = $stmt->num_rows;

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Return the result as JSON
$response = array('success' => false);

if ($num_rows > 0) {
    $response['success'] = true;
}

echo json_encode($response);
?>
