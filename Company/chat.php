<?php 
session_start();
include_once "config.php";
$uid = $_SESSION['unique_id'];
if (!isset($_SESSION['unique_id'])) {
  header("location: ../../Miniproject/Home/login.php");
}

$sql = "SELECT * FROM service_center WHERE unique_id = '$uid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user["fname"]; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body style="overflow: hidden;">
    <!-- Header -->
    <!-- <header class="sub-header">
      <div class="left-content">
        <p>Welcome to <?php echo $user["device"]; ?> service center. We provide quality services for your devices.</p>
      </div>
      <div class="right-icons">
        <ul>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
      </div>
    </header> -->

    <!-- Navigation -->
    <div class="background-header">
      <div class="header-area">
        <div class="logo"><?php echo $user["fname"]; ?></div>
        <nav class="main-navv clearfix">

          <div class="menu-trigger"></div>
          <ul class="navv">
            <li><a href="service_center.php">Home</a></li>
            <li><a href="#" style="color:#0575E6;">Chats</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="logout.php?logout_id=<?php echo $uid; ?>">Logout</a></li>

          </ul>
        </nav>
      </div>
    </div>

    <!-- About Us Section -->
    <!-- <section class="developers-section" style="background-color: #fff;">

  

      
    </section>
   
    <section>Heyy</section> -->

    <style>
      .containner {
  display: flex;
  background: #333;
  padding: 20px;
}

.left-section {
  
  flex: 70%;
 
  background: #333;
  /* Additional styling for the left section */
}

.right-section {
  flex: 30%;
  padding: 20px;
  
  /* Additional styling for the right section */
}
.inner-div {
  margin: 0px;
  
  background-color: #333;
  height: 100%;
  border: 1px solid black;
  border-radius: 20px;
  text-align: center;
  padding: 50px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;

  /* Additional styling for the inner div */
}

#inner-div{
  display: none;
}

.profile-picture {
  width: 150px;
  height: 150px;
  border-radius: 50%;
}

.username {
  color: #fff;
  font-size: 34px;
  margin-top: 20px;
}

.user-address {
  font-size: 16px;
  color: gray;
  margin-top: 5px;
}

    </style>

    <div class="containner">
  <div class="left-section">
  <div class="containner app">
        <div class=" app-one">
          <div class="col-sm-4 side">
            <div class="side-one">
              <div class="row heading">
                <div class="col-sm-3 col-xs-3 heading-avatar">
                  <div class="heading-avatar-icon">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                  </div>
                </div>
                <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                  <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                </div>
                <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                  <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                </div>
              </div>
              <div class="row searchBox">
                <div class="col-sm-12 searchBox-inner">
                  <div class="form-group has-feedback">
                    <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  </div>
                </div>
              </div>
              <div class="row sideBar">

                <div id="usersContainer"></div>

              </div>
            </div>
          </div>



          <div class="col-sm-8 conversation" id="convo">

            <div class="row heading">
              <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                <div class="heading-avatar-icon">
                  <img src="" id="imgg">
                </div>
              </div>
              <div class="col-sm-8 col-xs-7 heading-name">
                <a class="heading-name-meta" id="selectedUserName">
                </a>
                <span class="heading-online" id="userStatus">Online</span>
              </div>
              <div  class="col-sm-1 col-xs-1  heading-dot pull-right">
                <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
              </div>
            </div>



            <div class="row message" id="conversation">
              <!-- Messages will be dynamically added here -->
            </div>

            <div class="row reply">
              <div class="col-sm-1 col-xs-1 reply-emojis">
                <i class="fa fa-smile-o fa-2x"></i>
              </div>
              <div class="col-sm-9 col-xs-9 reply-main">
                <input id="incoming_id" type="text" hidden>
                <textarea id="message-input" class="form-control" rows="1" id="comment"></textarea>
              </div>
              <div class="col-sm-1 col-xs-1 reply-recording">
                <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
              </div>
              <div class="col-sm-1 col-xs-1 reply-send">
                <i class="fa fa-send fa-2x" onclick="sendMessage()" aria-hidden="true"></i>
              </div>
            </div>
          </div>

         
 </div>

 

      </div>
      <script src="get_users.js"></script>

      <script type="text/javascript">
        $(function() {
          $(".heading-compose").click(function() {
            $(".side-two").css({
              "left": "0"
            });
          });

          $(".newMessage-back").click(function() {
            $(".side-two").css({
              "left": "-100%"
            });
          });
        })


        var userMessages = document.getElementById('conversation');


        function sendMessage() {
          var message = document.getElementById("message-input").value;
          var incoming_id = document.getElementById('incoming_id').value;
          if (message.trim() === "") {
            return;
          }

          var xhr = new XMLHttpRequest();
          xhr.open("POST", "insert-chat.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

          xhr.onload = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                // Display the message in the chat body
                var messageContainer = document.createElement("div");
                messageContainer.className = "row message-body";
                var messageContent = document.createElement("div");
                messageContent.className = "col-sm-12 message-main-sender";
                var senderDiv = document.createElement("div");
                senderDiv.className = "sender";
                var messageText = document.createElement("div");
                messageText.className = "message-text";
                messageText.innerText = message;
                var messageTime = document.createElement("span");
                messageTime.className = "message-time pull-right";
                senderDiv.appendChild(messageText);
                senderDiv.appendChild(messageTime);
                messageContent.appendChild(senderDiv);
                messageContainer.appendChild(messageContent);
                document.getElementById("conversation").appendChild(messageContainer);
                document.getElementById("message-input").value = "";
                scrollToBottom();
              }
            }
          };

          var data = "message=" + encodeURIComponent(message) + "&incoming_id=" + encodeURIComponent(incoming_id);
          xhr.send(data);
        }

        function scrollToBottom() {
          userMessages.scrollTop = userMessages.scrollHeight;
        }
      </script>

  </div>
  <div class="right-section">
  <div id="inner-div" class="inner-div">
    <div class="profile">
      <img id="img2" src=""  class="profile-picture">
      <h3 class="username" id="name2"></h3>
      <p class="user-address">123 Main St, City, Country</p>
    </div>
  </div>
</div>

</div>



    <!-- Footer -->
    <!-- <footer class="footer">
      <div class="footer-content">
        <p>&copy; 2023 Service Center. All rights reserved.</p>
      </div>
    </footer> -->
  </body>

  </html>
  <?php
} else {
  echo "No user found.";
}

?>
