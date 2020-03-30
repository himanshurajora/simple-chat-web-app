<?php
    include("../conn.php");

    $q = "SELECT * FROM (SELECT * FROM chats ORDER BY id DESC LIMIT 10) t ORDER BY id ASC";
    $result = mysqli_query($conn, $q);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<h4>".$row['message']."<sup style='color:green; font-size:10px'>".$row['username']."</sup></h4><hr>";
        }

    }
?>