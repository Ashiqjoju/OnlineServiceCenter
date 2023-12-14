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
  background-color: #f0f0f0;
  font-family: Arial, sans-serif;
  opacity: 1;
  animation: fadeInOut 1s linear;
}

/* @keyframes fadeInOut {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.5;
  }
  100% {
      opacity: 1;
    }
} */

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
                <a class="hedd"  style="color:#fff;" href="index.php"><label id="textAnimation"><b><span id="textDiv" class="text" style="font-size: larger">Messages</span></b></label></a>
            </div>
        </div>
      <i class="fa-thin fa-ellipsis-stroke-vertical"></i>
          </nav>
    
    
<style>
  a{
  -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none;
    -webkit-touch-callout: none; /* Disable touch callout menu */
      user-select: none; /* Disable text selection */
}
#firstDiv{
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}
</style>


<!-- first div -->
<div class="scrollable" id="firstDiv" >
<div class="search">
        <span class="tex" style="color:#333;font-size:x-small">Select an user to start chat</span>
        <input type="tet" style="color:#fff;font-size:small" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
    <div class="chats">
      
         <a href="bot.php">
          <div class="chat1">
           <img class="chat_avata" src="php/images/chatbot.png">
           <div class="chat_info">
             <div class="contact_name" style="color:#fff;"> ChatBot </div>
             <div class="contact_msg"> Click here to Activate me !! </div>
           </div>
           <div class="chat_status">
             
             <div class="chat_new grad_pb">NEW</div>
           </div>
        </div></a>
        </div>
        <div class="users-list"></div>
</div>


<!-- Second div -->
<div class="scrollable" id="secondDiv" style="display: none;">


<?php 
$sql = "SELECT * FROM service_emp where cust_id = '$uid' order by service_id desc";
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



<!-- Fourth div -->
<div class="scrollable" id="fourthDiv" style="display: none;">
<!--     
<button onclick="openNewActivity()">Open Activity</button>
 -->

<style>
    /* Center align the icons */

    /* Style the container */
    .container {
      text-align: center;
      width: 60%;
      margin-top: 50%;
      margin-left: 20%;
    }
    
    /* Style the icons */
    .icon-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      opacity: 0;
      transition: opacity 0.5s ease;
    }
    
    .icon-container ion-icon {
      font-size: 24px;
      width: 24px;
      height: 24px;
      margin-right: 10px;
    }
    
    /* Style the status messages */
    .status {
      font-size: 14px;
    }
    
    /* Style the button */
    .check-button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      margin-top: 30%;
      border-radius: 4px;
      background-color: #333;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <button class="check-button" onclick="showIcons()">Check My Phone</button>
    
    <div id="icons-container" style="display: none;">
      <div class="icon-container">
        <ion-icon name="wifi-outline" data-name="Wi-Fi"></ion-icon>
        <span class="status">Checking Wi-Fi...</span>
      </div>
    
      <div class="icon-container">
        <ion-icon name="bluetooth-outline" data-name="Bluetooth"></ion-icon>
        <span class="status">Checking Bluetooth...</span>
      </div>
    
      <div class="icon-container">
        <ion-icon name="battery-charging-outline" data-name="Battery"></ion-icon>
        <span class="status">Checking Battery...</span>
      </div>
    
      <div class="icon-container">
        <ion-icon name="camera-outline" data-name="Camera"></ion-icon>
        <span class="status">Checking Camera...</span>
      </div>
    </div>
  </div>
  
  <script>
    function showIcons() {
      const button = document.querySelector('.check-button');
      button.style.display = 'none';
      
      const iconsContainer = document.getElementById('icons-container');
      iconsContainer.style.display = 'block';
      
      const icons = document.getElementsByClassName('icon-container');
      const statuses = document.querySelectorAll('.status');
      let currentIcon = 0;
      
      function showIconContainer() {
        icons[currentIcon].style.opacity = 1;
        
        const currentIconName = icons[currentIcon].querySelector('ion-icon').getAttribute('data-name');
        statuses[currentIcon].textContent = `Checking ${currentIconName}...`;
        icons[currentIcon].style.backgroundColor = '#f0f0f0';
        
        setTimeout(() => {
          statuses[currentIcon].textContent = `${currentIconName} Checked`;
          icons[currentIcon].style.backgroundColor = 'green';
          icons[currentIcon].style.color = 'white';
          
          currentIcon++;
          if (currentIcon < icons.length) {
            showIconContainer();
          }
        }, 5000);
      }
      
      showIconContainer();
    }
  </script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

      
    
</div>


<!-- third div -->


<?php 

$sql = "SELECT * FROM users where unique_id='$uid'";
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
            <img src="php/images/<?php echo $img; ?>"  />
            <span></span>
          </div>

          <h2><?php echo "$firstname $lastname"; ?></h2>
          <p>Customer<br>
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

 
      