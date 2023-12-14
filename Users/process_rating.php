<!-- process_rating.php -->
<?php

include_once "php/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rate']; // Get the selected rating value
    $service_id = $_POST['service_id'];
    // Update the rating in the database
    $update_query = "UPDATE service_emp SET ratings = $rating WHERE service_id = $service_id";
    if (mysqli_query($conn, $update_query)) {
        echo "Rating updated successfully.";
        $avg_rating_query = "UPDATE emp_tech e
                            SET e.avg_rating = (SELECT AVG(s.ratings) FROM service_emp s WHERE s.emp_id = e.unique_id)
                            WHERE e.unique_id = (SELECT emp_id FROM service_emp WHERE service_id = $service_id)";
        
        if (mysqli_query($conn, $avg_rating_query)) {
            echo "Average rating updated in employee table.";
        } else {
            echo "Error updating average rating in employee table: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating rating: " . mysqli_error($connection);
    }
}
?>
