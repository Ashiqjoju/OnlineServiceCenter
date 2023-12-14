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
  background-color: #111828;
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
        <span class="tex" style="color:#fff;font-size:x-small">Select an user to start chat</span>
        <input type="tet" style="color:#fff;font-size:x-small" placeholder="Enter name to search...">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $("#pincodeInput").on("input", function() {
        var pincode = $(this).val();

        if (pincode.length > 6) {
          $(this).val(pincode.substr(0, 6));
        }
      });

      $("#searchButton").click(function() {
        var pincode = $("#pincodeInput").val();

        if (pincode.length === 6) {
          $.ajax({
            type: "POST",
            url: "search.php",
            data: { pincode: pincode },
            success: function(response) {
              $("#resultContainer").html(response);
            }
          });
        } else {
          alert("Please enter a 6-digit pincode.");
        }
      });
    });
  </script>

  <div id="pincodeForm">
    <input type="text" id="pincodeInput" placeholder="Enter Pincode" required>
    <button type="button" id="searchButton">Search</button>
  </div>

  <div id="resultContainer"></div>



</div>



<!-- Fourth div -->
<div class="scrollable" id="fourthDiv" style="display: none;">
    
<button onclick="openNewActivity()">Open Activity</button>
<a href="offline.html"><button>click me</button></a>
<a href="profile.html"><button>Demo</button></a>
<a href="chatgpt/index.html"><button>ChatGpt</button></a>

      
    
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

<div class="scrollable" id="thirdDiv" style="display: none; background:#111828;">
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

 
      