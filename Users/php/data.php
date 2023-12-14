<?php
error_reporting(E_ERROR | E_PARSE);
$decryptionKey = "YourEncryptionKey"; // Replace with your own encryption key
$iv = "YourInitializationVector";


while($row10 = mysqli_fetch_assoc($query10) ){
        

  $sql3 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row10['unique_id']}
  OR outgoing_msg_id = {$row10['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
  OR incoming_msg_id = {$outgoing_id})  ORDER BY msg_id DESC";
$query3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($query3);
(mysqli_num_rows($query3) > 0) ? $result5 = $row3['msg'] : $result5 ="No message available";
(strlen($result5) > 28) ? $msg5 =  substr($result5, 0, 28) . '...' : $msg5 = $result5;

if(isset($row3['outgoing_msg_id'])){
($outgoing_id == $row3['outgoing_msg_id']) ? $you = "You: " : $you = "";
}else{
$you = "";
}
($row10['status'] == "Offline now") ? $offline = "offline" : $offline = "";
($outgoing_id == $row10['unique_id']) ? $hid_me = "hide" : $hid_me = "";

$output .= '<a class="aa" href="comp_chat.php?unique_id='. $row10['unique_id'] .'">
<div class="chat">
<img class="chat_avatar" src="../../../Miniproject/images/'. $row10['img'] .'" >
<div class="chat_info">
<div class="contact_name">'. $row10['fname'] ." ". $row10['device'] .'</div>
<div class="contact_msg"> '. $you . $msg5 .'</div>
</div>
<div class="chat_status">
<div class="chat_new"> 
<div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
</div>
</div>
</div>
</a>'
;


}



    while($row = mysqli_fetch_assoc($query) ){
        

      $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
      OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
      OR incoming_msg_id = {$outgoing_id})  ORDER BY msg_id DESC";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($query2);
(mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
(strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

if(isset($row2['outgoing_msg_id'])){
  ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
}else{
  $you = "";
}
($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

$output .= '<a class="aa" href="chat.php?unique_id='. $row['unique_id'] .'">
<div class="chat">
<img class="chat_avatar" src="php/images/'. $row['img'] .'" >
<div class="chat_info">
<div class="contact_name">'. $row['fname'] ." ". $row['lname'] .'</div>
<div class="contact_msg"> '. $you . $msg .'</div>
</div>
<div class="chat_status">
<div class="chat_new"> 
<div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
</div>
</div>
</div>
</a>'
;

    
    }
?>
