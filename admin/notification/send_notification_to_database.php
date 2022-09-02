<?php

require_once("../../Glob/database/database.php");


if(isset($_POST['note_header'])){

$note_header=$_POST['note_header'];
$note_message=$_POST['note_message'];

$stmt = $conn->prepare("INSERT INTO notification_message (notification_header,notification_message) VALUES (?, ?)");
$stmt->bind_param("ss", $note_header,$note_message);






if($stmt->execute()){

$note=mysqli_query($conn,"UPDATE login SET notification_status=(notification_status+1)") ; 

    echo "Notification Successfully Send";
    $stmt->close();
    $conn->close();
}else{

    echo "Notification Failded";
}





    


}











?>