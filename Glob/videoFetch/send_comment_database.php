<?php
include("../database/database.php");

if(isset($_POST['comment_message'])){
$comment_message= $_POST['comment_message'];
 $video_id = $_POST['video_id'];

 $commet_from_username = $_POST['comment_from_username'];
 $comment_to_username = $_POST['comment_to_username'];

 


$stmt = $conn->prepare("INSERT INTO video_comments (comment_from_username,comment_to_username,video_id,comment_message) VALUES (?, ?,?,?)");
$stmt->bind_param("ssis",$commet_from_username,$comment_to_username,$video_id,$comment_message);




if($stmt->execute()){
    echo "Thanks For Comment !!";

}else{
    echo "Remove Emojis";
}
}else{
    echo "Error";
}











?>