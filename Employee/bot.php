
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  $unique_id = $_SESSION['unique_id'];
setcookie("unique_id", $unique_id, time() + 3600); 
?>
<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="javascript/script.js"></script>
    <script src="javascript/app.js"></script>
    <script src="javascript/dataset.js"></script>
    <script src="javascript/mobile_solution.js"></script>
    <link rel="stylesheet" href="css/bot.css" />
    <title>ChatBot </title>
</head>

<body onload="startFunction()" style="background-color: #202938; overflow: hidden;">
<div class="wrapper">
    <section class="chat-area">
        <header style="background-color:#333 ;">
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img class="dpimg" onclick="openFullScreenDP()" src="php/images/chatbot.png" alt="">
            <div class="personalInfo">
                <label style="font-size:medium;font-weight:bold" id="botname"></label><br>
                <label style="font-size:x-small;color:#89888d"id="lastseen">last seen today at 3:24 pms</label>
            </div>
      </header>



      <div class="chat-box" style="padding: 0%;">
    <div class="scrollable" id="myScrollable">
        <div id="chatting" class="chatting" >
            <ul id="listUL">
            </ul>
        </div>
    </div>
      </div>
      <script>
        </script>


<style>
    #myElement {
      display: none;
      opacity: 0;
      transition: opacity 0.5s, transform 0.5s;
      background: transparent;
    }
#myElement1{
  display:none;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #333;
  margin-top: 5px;
  padding: 10px 50px 15px 50px;
  border-radius: 20px 20px 0 0;
  color: #89888d;
  font-size: x-small;
  overflow: hidden;
  font-weight: 300;
}
.centered {
  text-align: center;
}
    .show {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }

    .show-animation {
      animation: slideUp 0.5s forwards;
    }
    

    @keyframes slideUp {
      from {
        transform: translateY(100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
    </style>
        <div class="sendBar" id="myElement" style="background-color: #333; width:95%;margin:0 10px 0 10px ; border-radius: 20px; " >
            <input id="inputMSG" onkeypress="isEnter(event)" type="text" placeholder="Type a message" autofocus >
            <svg id="btid" onclick=" saveMessage(); sendMsg();"  viewBox="0 0 24 24" width="30" height="30" class="">
                <path fill="currentColor"
                    d="M1.101 21.757 23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path>
            </svg>
        </div>

        <div class="sendBar" id="myElement1">
          <span class="centered">Your <b> Conversation</b> with our <b>ChatBot</b> has ended.</span>
          <span class="centered" onclick="goBack()"> click here to go Back to <b>HOME.</b></span>
        </div>

        
    </section>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
<script>
  function goBack() {
  window.history.back();
}

    document.addEventListener('copy', function(event) {
  event.preventDefault();
});





</script>

