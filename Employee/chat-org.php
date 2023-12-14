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
    display: block;
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
</style>
<style>
    /* CSS styles to center the div */
    .centered-div {
      
      color: #fff;

    }
    table {
      color: #fff;
      border-collapse: collapse;
      border-radius: 20px;
    }

    th, td {
      border: 0px solid black;
      padding: 8px;
    }

    
.collapsible {
  background-color: #333;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  margin: 15px 0;
  border: none;
  text-align: left;
  border-radius: 20px;
  outline: none;
  font-size: 15px;
  font-weight: 900;
}

.active, .collapsible:hover {
  background-color: #fff;
  color: #333;
  font-weight: 900;
}

.content {
  display: none;
 
  background-color: #333;
}

  </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="css/chat.css" />
<body style="overflow: hidden; background-color: #202938;">
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

    $query = "SELECT * FROM service_emp where cust_id='$user_unique_id' AND emp_id='$uid'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {


      echo '<div class="container">';
      echo '  <div class="row justify-content-center">';
      echo '    <div class="col-md-6">';
      echo '      <div id="billingDiv">';
      echo '        <div class="date">';
      echo '            <span id="">' . $row['service_id'] . '</span><br>';
      echo '            <span id="currentDate"></span>';
      echo '          </div>';
      echo '          <div id="device_info">';
      echo '            <span>' . $row['device'] . $row['device_sub'] . '</span><br>';
      echo '            <span>' . $row['pincode'] . '</span><br>';
      echo '            <span>Thrissur</span>';
      echo '          </div>';
      echo '          <h2>Billing</h2>';
      echo '          <table id="productTable">';
      echo '            <thead>';
      echo '              <tr>';
      echo '                <th>Description</th>';
      echo '                <th>Amount</th>';
      echo '                <th>Delete</th>';
      echo '              </tr>';
      echo '            </thead>';
      echo '            <tbody>';
      echo '';
      echo '            </tbody>';
      echo '          </table>';
      echo '          <div id="totalAmount">Total Amount: $0.00</div>';
      echo '          <button class="bbutton" onclick="addProduct()">+</button>';
      echo '        </div>';
      echo '      </div>';
      echo '    </div>';
      echo '  </div>';
      echo '</div>';
      

  
}

?>
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

  document.getElementById("infoIcon").addEventListener("click", showLoading);
  document.getElementById("CloseIcon").addEventListener("click", showLoading);


  function ShowInfo(){
    infoscreendiv.style.display="block";

    chatsreendiv.style.display="none";
    footer.style.display="none";
    infoIcon.style.display="none";
    CloseIcon.style.display="block";
  }
  function closePopup(){
    infoscreendiv.style.display="none";
    chatsreendiv.style.display="block";
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


<script src="https://cdn.jsdelivr.net/npm/qrcode@latest"></script>
  <script>
    function formatDate(date) {
      var options = { year: 'numeric', month: 'long', day: 'numeric' };
      return date.toLocaleDateString(undefined, options);
    }

    var currentDateElement = document.getElementById("currentDate");
    var currentDate = new Date();
    currentDateElement.textContent = "Date: " + formatDate(currentDate);

    function addProduct() {
      var product = prompt("Enter product description:");
      var amount = parseFloat(prompt("Enter product amount:"));
      
      if (product && !isNaN(amount)) {
        var productTable = document.getElementById("productTable");
        var tbody = productTable.getElementsByTagName("tbody")[0];

        var newRow = document.createElement("tr");

        var descriptionCell = document.createElement("td");
        descriptionCell.textContent = product;

        var amountCell = document.createElement("td");
        amountCell.textContent = amount.toFixed(2);

        var deleteCell = document.createElement("td");
        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", function() {
          deleteRow(this);
        });

        deleteCell.appendChild(deleteButton);

        newRow.appendChild(descriptionCell);
        newRow.appendChild(amountCell);
        newRow.appendChild(deleteCell);

        tbody.appendChild(newRow);
        
        updateTotalAmount();
        generateQRCode();

        var xhr = new XMLHttpRequest();
      var url = "combined_script.php";
      var params = "description=" + encodeURIComponent(product) + "&amount=" + encodeURIComponent(amount.toFixed(2));

      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText); // Response from the PHP script
        }
      };
      xhr.send(params);

      }
    }
    
    function updateTotalAmount() {
      var productTable = document.getElementById("productTable");
      var tbody = productTable.getElementsByTagName("tbody")[0];
      var rows = tbody.getElementsByTagName("tr");
      var totalAmount = 0;
      
      for (var i = 0; i < rows.length; i++) {
        var amountCell = rows[i].getElementsByTagName("td")[1];
        var amount = parseFloat(amountCell.textContent);
        
        if (!isNaN(amount)) {
          totalAmount += amount;
        }
      }
      
      var totalAmountElement = document.getElementById("totalAmount");
      totalAmountElement.textContent = "Total Amount: $" + totalAmount.toFixed(2);
    }
    
    function deleteRow(button) {
      var row = button.parentNode.parentNode;
      var tbody = row.parentNode;
      tbody.removeChild(row);
      
      updateTotalAmount();  
       // AJAX request to delete from PHP database
    var xhr = new XMLHttpRequest();
    var url = "combined_script.php";
    var params = "description=" + encodeURIComponent(description) + "&amount=" + encodeURIComponent(amount.toFixed(2));

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(xhr.responseText); // Response from the PHP script
      }
    };
    xhr.send(params);
    }
  </script>
</body>
</html>


