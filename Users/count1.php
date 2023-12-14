<?php
include_once "php/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $device = $_POST["device"];


$query = "
SELECT device, COUNT(*) AS device_count
FROM emp_tech
WHERE active = 'on'
GROUP BY device;
";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch and display the results for each device type
    while ($row = $result->fetch_assoc()) {
        $deviceType = $row['device'];
        $deviceCount = $row['device_count'];
        echo "Number of employees active with $deviceType: $deviceCount<br>";
    }

    // Close the result set
    $result->close();
} else {
    echo "Error: " . $conn->error;
}

}
?>
