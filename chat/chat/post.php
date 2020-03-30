<?php
session_start();

$username = $_SESSION['username'];
    include("../conn.php");
    
            $message = $_POST['message'];
            if($message == ""){
                $nothing = true;
            }
            else{
                $sql = "INSERT INTO chats(username,message) VALUES('".$username."','".$message."')";
                mysqli_query($conn, $sql);
        }
?>