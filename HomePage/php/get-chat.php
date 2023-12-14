<?php 
error_reporting(E_ERROR | E_PARSE);
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $decryptionKey = "YourEncryptionKey"; // Replace with your own encryption key
        $iv = "YourInitializationVector"; // Replace with your own initialization vector


        $sql = "SELECT * FROM messages LEFT JOIN emp_tech ON emp_tech.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $encryptedPassword = $row['msg'];
        $decryptedPassword = openssl_decrypt($encryptedPassword, 'AES-256-CBC', $decryptionKey, 0, $iv);

                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p class="black">'. $decryptedPassword .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p >'. $decryptedPassword .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text" style="color:#fff">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?> 
