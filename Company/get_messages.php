
<?php

session_start();
    if(isset($_SESSION['unique_id'])){

      $outgoing_id = $_SESSION['unique_id'];

include_once "config.php";
if (isset($_POST['userId'])) {
  $userId = $_POST['userId'];
  // current user // msg send
    $incoming_id = $userId; //mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
  WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
  OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_assoc($query)){
  $msg = $row['msg'];

  if($row['outgoing_msg_id'] === $outgoing_id){
      $output .= '
      


<div class="row message-body">
<div class="col-sm-12 message-main-sender">
<div class="sender">
<div class="message-text">
'. $msg .'
</div>
</div>
</div>
</div>
      
      ';
      
      
  }else{
      $output .= '
      
      <div class="row message-previous">
      </div>
      <div class="row message-body">
      <div class="col-sm-12 message-main-receiver">
      <div class="receiver">
      <div class="message-text">
      '. $msg .'
      </div>
      </div>
      </div>
      </div>
      
      
      
      ';
  }
}
}else{
$output .= '<div class="text" style="color:#fff">No messages are available. Once you send message they will appear here.</div>';
}
echo $output;
}
else{
header("location: ../login.php");
}
    }

?>



