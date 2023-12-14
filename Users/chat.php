<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  $user_id = mysqli_real_escape_string($conn, $_GET['unique_id']);

include_once "header.php";

$sql1 = "SELECT * FROM service_emp WHERE cust_id = '" . $_SESSION['unique_id'] . "' AND emp_id = '$user_id'";
$result = $conn->query($sql1);


$user = $result->fetch_assoc();
$idd = $user['service_id'];
//error_reporting(0); // Turn off error reporting
ini_set('display_errors', 0);

if ($user["service_status"] != "Service Completed") {
 

 // Disable displaying errors
  

  


?>
<style>
    button{
  -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none;
    -webkit-touch-callout: none; /* Disable touch callout menu */
      user-select: none; /* Disable text selection */
}
  </style>
<link rel="stylesheet" href="css/chat.css" />
<body id="body1" style="overflow: hidden; background-color: #f0f0f0;">
  <div class="wrapper">
    <section class="chat-area">
      <header style="background-color: #333;">
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['unique_id']);
          $sql = mysqli_query($conn, "SELECT * FROM emp_tech WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><b><?php echo $row['fname'] ." ".$row['lname'] ?></b></span>
          <p style="font-size: x-small; color: #89888d;"><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>

      <footer>
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

</body>
</html>
<?php
} else 

{

  ?>

  <link rel="stylesheet" href="css/chat.css" />
  <body id="body1" style="overflow: hidden; background-color: #f0f0f0;">
    <div class="wrapper">
      <section class="chat-area">
        <header style="background-color: #333; ">
          <?php 
            $user_id = mysqli_real_escape_string($conn, $_GET['unique_id']);
            $sql = mysqli_query($conn, "SELECT * FROM emp_tech WHERE unique_id = {$user_id}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }else{
              header("location: users.php");
            }
          ?>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><b><?php echo $row['fname'] ." ".$row['lname'] ?></b></span>
            <p style="font-size: x-small; color: #89888d;"><?php echo $row['status']; ?></p>
          </div>
        </header>

  


        <style>



  .rating {
    background-color: #333;
    border-radius:20px;
    padding: 20px;
    margin: 5px;
    margin-top: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: small;
    font-weight: bold;
    color: #f0f0f0;
  }

  .rate {
    height: 100px;
    padding: 0 10px;
    
  }

  .rate:not(:checked) > input {
    position: absolute;
    top: -9999px;
  }

  .rate:not(:checked) > label {
    float: right;
    padding: 10px;
    width: 1.6em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 25px;
    color: #ccc;
  }

  .rate:not(:checked) > label:before {
    content: '★ ';
  }

  .rate > input:checked ~ label {
    color: #ffc700;
  }

  .rate:not(:checked) > label:hover,
  .rate:not(:checked) > label:hover ~ label {
    color: #deb217;
  }

  .rate > input:checked + label:hover,
  .rate > input:checked + label:hover ~ label,
  .rate > input:checked ~ label:hover,
  .rate > input:checked ~ label:hover ~ label,
  .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
  }
  div{
  -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none;
    -webkit-touch-callout: none; /* Disable touch callout menu */
      user-select: none; /* Disable text selection */
}

footer {
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
  margin-top: 5px;
  padding: 10px 50px 15px 50px;
  border-radius: 20px 20px 0 0;
  color: #89888d;
  font-size: x-small;
  overflow: hidden;
  font-weight: 300;
}

/* Sticky footer */
footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
}
</style>


<!-- rating_form.php -->
<div class="rating">
    Rate your conversation with <?php echo $row['fname'] . " " . $row['lname'] ?>. <br>
    <form action="process_rating.php" method="post">
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" checked />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>
        <br>
        <input type="hidden" name="service_id" value="<?php echo $idd; ?>">
    <input type="submit" value="Submit Rating">
    </form>
</div>



    <footer style="background-color: #333; border-radius:20px 20px 0 0">
    <span class="centered">Your <b> Conversation</b> with our <b>Technician</b> has ended.</span>
          <span class="centered" style="padding-bottom: 5px;" onclick="goBack()"> click here to go Back to <b>HOME.</b></span>
  </footer>
      
      </section>
    </div>
  
    <script src="javascript/chat.js"></script>
  
  </body>

<?php
    
}

?>

<script>
  function goBack() {
  window.history.back();
}
</script>