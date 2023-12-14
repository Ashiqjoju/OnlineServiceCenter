<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="css/chat.css" />
<body style="overflow: hidden; background-color: #f0f0f0;">
  <div class="wrapper">
    <section class="chat-area">
      <header style="background-color: #333;">
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['unique_id']);
          $sql = mysqli_query($conn, "SELECT * FROM service_center WHERE unique_id = {$user_id}");
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
          <p style="font-size: small; color: #89888d;"><?php echo $row['status']; ?></p>
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

