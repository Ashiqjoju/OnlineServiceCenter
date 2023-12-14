<?php 
  session_start();
  $uid=$_SESSION['unique_id'];
  $user_unique_id = $_GET['unique_id'];
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<style>
  #ChatArea{
    display: flex;
    flex-direction: column;
  }
  #ChatArea1{
    display: none;
    padding: 0;
    margin: 0;
  }
  #CloseIcon{
    display: none;
  }
  #footer1{
    display: flex;
  }
  .info-icon , .close-button{
      position: absolute;
      top: 30px;
      right: 20px;
      font-size: 20px;
      cursor: pointer;
    }

  .gooey{
    position: absolute;
  top: 50%;
  left: 50%;
  width: 142px;
  height: 40px;
  margin: -20px 0 0 -71px;
  background-color: rgba(0, 0, 0, 0.8);
  border-radius: 10px;
  filter: contrast(20);
  }

  
  .dot{
    position: absolute;
    width: 16px;
    height: 16px;
    top: 12px;
    left: 15px;
    filter: blur(4px);
    background: #fff;
    border-radius: 50%;
    transform: translateX(0);
    animation: dot 2.8s infinite;
  }
  .dots{
    transform: translateX(0);
    margin-top: 12px;
    margin-left: 31px;
    animation: dots 2.8s infinite;
  }
    .span{
      display: block;
      float: left;
      width: 16px;
      height: 16px;
      margin-left: 16px;
      filter: blur(4px);
      background: #fff;
      border-radius: 50%;
  }

select{
  width:100%;
  height: 40px;
  background-color: #333;
  color: #f0f0f0;
  border: 20px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;


}


    th {
      background-color: #f2f2f2;
      color: #333;
    }

    table {
      margin-top: 50px;
      color: #fff;
      text-align: center;
      border-collapse: collapse;
      border-radius: 20px;
      margin-bottom: 10px;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }


    th, td {
      border: 0px solid black;
      padding: 8px;
    }

 
@keyframes dot{
  50%{
    transform: translateX(96px);
  }
}
@keyframes dots{
  50% {
    transform: translateX(-31px);
  }
}

    
  #loadingDiv {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
  }
  #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 9998;
  }

    /* CSS styles to center the div */
    .centered-div {
      
      color: #fff;

    }
    


.button-9 {
  appearance: button;
  backface-visibility: hidden;
  background-color: #405cf5;
  border-radius: 6px;
  border-width: 0;
  box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset,rgba(50, 50, 93, .1) 0 2px 5px 0,rgba(0, 0, 0, .07) 0 1px 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: -apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Ubuntu,sans-serif;
  font-size: 100%;
  height: 44px;
  line-height: 1.15;
  margin: 12px 0 0;
  outline: none;
  overflow: hidden;
  padding: 0 25px;
  position: relative;
  text-align: center;
  text-transform: none;
  transform: translateZ(0);
  transition: all .2s,box-shadow .08s ease-in;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
}

.button-9:disabled {
  cursor: default;
}

.button-9:focus {
  box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
}
  </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="css/chat.css" />
<body id="body" style="overflow: hidden; background-color: #f0f0f0;">
<div id="overlay"></div>

  <div class="wrapper">
    <section class="chat-area">
      <header style="background-color: #333;">
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['unique_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../../../Miniproject/Users/php/images/<?php echo $row['img'];?>" alt="">
        <div class="details">
          <span><b><?php echo $row['fname'] ." ".$row['lname'] ?></b></span>
          <p style="font-size: small; color: #89888d;"><?php echo $row['status']; ?></p>
        </div>
        <span class="info-icon" id="infoIcon" onclick="ShowInfo()" ><i class="fas fa-info-circle"></i></span>
        <span class="close-button"  id="CloseIcon" onclick="closePopup()"><i class="fas fa-times"></i></span>

      </header>

      <div id="loadingDiv">
  <div class="loading">
  <div class="gooey">
  <span class="dot"></span>
  <div class="dots">
    <span class="span"></span>
    <span class="span"></span>
    <span class="span"></span>
  </div>
</div>
  </div>
</div>

      <div class="chat-box" id="ChatArea">

      </div>

      <div class="chat-box" id="ChatArea1">
       <div class="centered-div">

       <?php 
$sql = "SELECT * FROM service_emp where cust_id='$user_unique_id' AND emp_id='$uid'";
$result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {


                  echo "<table>
                  <tr>  
                      <td style='text-align:center;background:#f0f0f0;color:#333;border: 1px solid #333;' colspan='2'>SERVICE <b>OSSC" . $row["service_id"] . "</b></td>
                  </tr> 
                  <tr> 
                      <th>Device</th>
                      <th>Status</th>
                  </tr>
                  <tr>";
          
          echo "<td>" . $row["device"] . "
          <br>". $row["pincode"]."
          </td>";
          echo "<td>
                  <select id='statusSelect" . $row["service_id"] . "'>
                      <option value='" . $row["service_status"] . "' selected>" . $row["service_status"] . "</option>
                      <option value='Technician will reach today'>Technician will reach today</option>
                      <option value='Item picked up by technician'>Item picked up by technician</option>
                      <option value='Service Completed'>Service Completed</option>
                  </select>
                  <button class='button-9' onclick='updateStatus(" . $row["service_id"] . ")'>UPDATE</button>
                </td>";
          echo "</tr></table>";
                }}?>          

    <script>
    function updateStatus(serviceId) {
        var selectElement = document.getElementById("statusSelect" + serviceId);
        var selectedStatus = selectElement.value;
        
        // Perform AJAX request to update the status on the server
        // Replace 'update_status.php' with the URL of your server-side update script
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response if needed
                // For example, you can update the UI to reflect the updated status
                console.log(xhr.responseText);
            }
        };
        
        xhr.send("service_id=" + encodeURIComponent(serviceId) + "&service_status=" + encodeURIComponent(selectedStatus));
    }
</script>

       </div>
      </div>

      <footer id="footer1">
        <div class="sendBar" style="background-color: #333;" >
        <form action="#" class="typing-area" >
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button>
        <svg  viewBox="0 0 24 24" width="35" height="35" class="">
                <path fill="currentColor"
                    d="M1.101 21.757 23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path>
            </svg></button>
        </div>
    </footer>
    
      
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
<script>
  var chatsreendiv = document.getElementById("ChatArea");
  var infoscreendiv = document.getElementById("ChatArea1");

  var loadingDiv = document.getElementById("loadingDiv");  
  var infoIcon = document.getElementById("infoIcon");
  var footer = document.getElementById("footer1");
  var CloseIcon=document.getElementById("CloseIcon");
  var body = document.getElementById("body");

  document.getElementById("infoIcon").addEventListener("click", showLoading);
  document.getElementById("CloseIcon").addEventListener("click", showLoading);


  function ShowInfo(){
    infoscreendiv.style.display="block";
    body.style.background="#333";
    chatsreendiv.style.display="none";
    footer.style.display="none";
    infoIcon.style.display="none";
    CloseIcon.style.display="block";
  }
  function closePopup(){
    infoscreendiv.style.display="none";
    chatsreendiv.style.display="block";
    body.style.background="#f0f0f0";
    footer.style.display="block";
    infoIcon.style.display="block";
    CloseIcon.style.display="none";
  }

  function showLoading() {
    var loadingDiv = document.getElementById("loadingDiv");
    var overlay = document.getElementById("overlay");
    loadingDiv.style.display = "block";
    overlay.style.display = "block";
  
    // Simulating a delay for demonstration purposes
    setTimeout(function() {
      loadingDiv.style.display = "none";
      overlay.style.display = "none";
    }, 1500);
  }


</script>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>



</body>
</html>


