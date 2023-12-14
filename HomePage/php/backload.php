<?php

include_once "config.php";
if (isset($_COOKIE['inputMessages']) &&  isset($_COOKIE['values']) && isset($_COOKIE['clickedButtons']) && isset($_COOKIE['unique_id'])) {

    $clickedButtons = $_COOKIE['clickedButtons'];
    $allmsg = $_COOKIE['values'];
    $cookieValue = $_COOKIE['inputMessages'];
    $unique_id = $_COOKIE['unique_id'];

    $unique_idd = json_decode($unique_id );
    $allms = json_decode($allmsg );
    $inputMessages = json_decode($cookieValue );
    $Devices = json_decode($clickedButtons );


    $uniqueArray = array_unique($allms);

    $currentDateTime = date('Ymd_His');
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');


    $variable3 = 'txt';
    $fileName = 'text/' . $unique_idd . '_' . $currentDateTime . '.' . $variable3;

    $sql = "INSERT INTO text_files (unique_id,file_name) VALUES ('$unique_idd','$fileName')";

if ($conn->query($sql) === TRUE) {

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$file = fopen( $fileName, 'w'); // Open the file in write mode

if ($file) {

        fwrite($file, $unique_idd ."\n");
        fwrite($file, $currentDate ."\n");
        fwrite($file, $currentTime ."\n");

    foreach ($uniqueArray as $value) {
        fwrite($file, $value . "\n"); // Write each array value followed by a newline character
    }
    
    fclose($file); // Close the file
    echo 'File created successfully.';
} else {
    echo 'Unable to open the file.';
}

}
?>