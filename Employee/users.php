<?php 
  session_start();
  include_once "php/config.php";
  $uid=$_SESSION['unique_id'];
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php ?>
<style>
  body {
  background-color: #333;
  font-family: Arial, sans-serif;
  opacity: 1;

}
  </style>

<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="path/to/your/fontawesome.min.css">
<link rel="stylesheet" href="css/users.css">
<script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
</head>
<body >
    <nav>
        <div class="navbar">
            <div class="personalInfo">
                <a class="hedd"  style="color:#fff;" href="index.php"><label id="textAnimation"><b><span id="textDiv" style="font-size: larger;  letter-spacing: .15em;">Employee Chat</span></b></label></a>
            </div>
        </div>
    </nav>
    
    
<style>
  a, label{
  -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none;
    -webkit-touch-callout: none; /* Disable touch callout menu */
      user-select: none; /* Disable text selection */
}
</style>



<div class="scrollable" id="firstDiv" >
<div class="search">
        <span class="text" style="color:#333;font-size:x-small">Select an user to start chat</span>
        <input type="text" style="color:#fff;font-size:x-small" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>

        <div class="users-list"></div>
</div>

<div class="scrollable" id="secondDiv" style="display: none;">
    
<?php 
$sql = "SELECT * FROM service_emp where emp_id = '$uid' order by service_id desc";
$result = $conn->query($sql);
?>

  <style>
    table {
      margin-top: 50px;
      color: #fff;
      text-align: center;
      border-collapse: collapse;
      border-radius: 20px;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }


    th, td {
      border: 0px solid black;
      padding: 8px;
    }
    th{
      color: #333;
      background-color: #f0f0f0;
    }
    td{
      color: #f0f0f0;
      background-color: #333;
    }
  </style>

<table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Device</th>
                <th>Status</th>
                <!-- Add more table headers for each column in your SQL table -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the result set and display the data in the table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["emp_id"] . "</td>";
                    echo "<td>" . $row["device"] . "</td>";
                    echo "<td>" . $row["service_status"] . "</td>";
                    // Add more table cells for each column in your SQL table
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>


</div>

<div class="scrollable" id="fourthDiv" style="display: none;">
<!DOCTYPE html>
<html>
<head>
  <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    
    
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    .switch-container {
      text-align: center;
    }
    input[type="submit"] {
    background-color: #333; /* Green background color */
    color: white; /* Text color */
    padding: 10px 20px; /* Padding around the text */
    font-size: 16px; /* Text size */
    border: none; /* No border */
    cursor: pointer; /* Cursor on hover */
    border-radius: 4px; /* Rounded corners */
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  }
  </style>
</head>
<body>
  <?php

  $result = $conn->query("SELECT Active FROM emp_tech");
  $row = $result->fetch_assoc();
  $activeValue = $row['Active'];

  // Update the 'Active' column based on the switch state
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  // }

  if (isset($_POST['save'])) {

    $activeValue = ($_POST["toggleSwitch"] == "on") ? "on" : "off";
    $sql = "UPDATE emp_tech SET Active='$activeValue' where unique_id='$uid'";
    if ($conn->query($sql) === TRUE) {
     
    } 
  }



  ?>
<div class="container">
    <div class="switch-container">
  <form method="post">
  <table style="width: 500px;">
    <tr>
      <th colspan="3"> <h3>Active Now: <?php echo $activeValue; ?></h3></th>
    </tr>
    <tr>
      <td>ACTIVE</td>
      <td><label class="switch">
      <input type="checkbox" name="toggleSwitch" <?php if ($activeValue == "on") echo "checked"; ?>>
      <span class="slider round"></span>
    </label></td>
      <td> <input type="submit" name="save" value="Save"></td>
    </tr>
  </table>
  </form>
<br>
<hr>
<br>


  <?php
  // Assuming you have a database connection established

  if (isset($_POST['update'])) {
    $times = $_POST['time']; // Array containing the selected time slots

    // Update the database with the selected time slots
    $availableTimes = implode(',', $times); // Convert the array to a comma-separated string
    $query = "UPDATE emp_tech SET available_time = '$availableTimes' where unique_id='$uid' ";

    // Check the connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Execute the query to update the database
    if ($conn->query($query) === TRUE) {
      // Update successful
    }

    // Checkboxes that are in the database will be checked on page load
  }
  ?>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label><input type="checkbox" name="time[]" value="12am - 5am">12am - 5am</label>
    <label><input type="checkbox" name="time[]" value="6am - 11am">6am - 11am</label>
    <label><input type="checkbox" name="time[]" value="12pm - 5pm">12pm - 5pm</label>
    <label><input type="checkbox" name="time[]" value="6pm - 11pm">6pm - 11pm</label>
    <input type="submit" name="update" value="Update">
  </form>


</div></div>

</div>


<?php 

$sql = "SELECT * FROM emp_tech where unique_id='$uid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $firstname = $row["fname"] ;
    $lastname = $row["lname"] ;
    $emailid = $row["email"];
    $img = $row["img"];
  }
  } 
?>

<div class="scrollable" id="thirdDiv" style="display: none; background:#f0f0f0;">
<div class="header__wrapper">
      <header></header>
      <div class="cols__container">
        <div class="left__col">
          
          <div class="img__container">
            <img src="../../Miniproject/images/<?php echo $img; ?>"  />
            <span></span>
          </div>

          <h2><?php echo "$firstname"; ?></h2>
          <p>Employee<br>
          <?php echo $emailid; ?><br>
          USER ID : <?php echo $uid; ?>
        </p>
        <p>Edit profile  <i style='font-size:14px' class='far'>&#xf044;</i></p>
          <div class="content">
            <p style="border-radius:0 0px 5px 5px ;">
            <a href="php/logout.php?logout_id=<?php  echo $uid;?>"> <button class="button-30">Logout</button></a>
            </p>
          </div>
        </div>       
      </div>     
</div>    
</div>
       
<div class="bottom-bar">
  <ion-icon name="home-outline" class="icon active1" onclick="change(this);showFirstDiv();"></ion-icon>
  <ion-icon name="chatbubble-ellipses-outline" class="icon" onclick="change(this);showSecondDiv();"></ion-icon> 
   <ion-icon name="refresh-outline" class="icon" onclick="change(this);showfourthDiv();"></ion-icon>
  <ion-icon name="person-outline" class="icon" onclick="change(this);showThirdDiv();"></ion-icon>
</div>

<script>
  function change(item){
      const buttons = document.querySelectorAll('ion-icon');
      buttons.forEach(function(obj){
          obj.classList.remove("active1");
      });
      item.classList.add("active1");
  }
</script>
    
    

</body>
<script>
    function showFirstDiv() {
  document.getElementById("firstDiv").style.display = "block";
  document.getElementById("secondDiv").style.display = "none";
  document.getElementById("thirdDiv").style.display = "none";
  document.getElementById("fourthDiv").style.display="none";

  document.getElementById("textDiv").textContent = "Chats";
}

function showSecondDiv() {
  document.getElementById("firstDiv").style.display = "none";
  document.getElementById("secondDiv").style.display = "block";
  document.getElementById("thirdDiv").style.display = "none";
  document.getElementById("fourthDiv").style.display="none";

  document.getElementById("textDiv").textContent = "Services";
}

function showThirdDiv() {
  document.getElementById("firstDiv").style.display = "none";
  document.getElementById("secondDiv").style.display = "none";
  document.getElementById("thirdDiv").style.display = "block";
  document.getElementById("fourthDiv").style.display="none";

  document.getElementById("textDiv").textContent = "Profile";
}

function showfourthDiv() {
  document.getElementById("firstDiv").style.display = "none";
  document.getElementById("secondDiv").style.display = "none";
  document.getElementById("thirdDiv").style.display = "none";
  document.getElementById("fourthDiv").style.display="block";
  document.getElementById("textDiv").textContent = "System Check";
}


document.addEventListener('touchstart', function(event) {
  if (event.target.tagName === 'A') {
    event.preventDefault();
  }
});

function openNewActivity() {
        // Call a JavaScript function to communicate with the Android application
        window.android.openNewActivity();
}



</script>
<script src="javascript/users.js"></script>
  

</html>

 
      