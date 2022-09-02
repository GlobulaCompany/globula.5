<?php


require("../database/database.php");
 
function get_total_likes_of_video($video_id,$conn){
 

$query= mysqli_query( $conn,"SELECT * FROM video_likes WHERE video_id='{$video_id}'") or die(mysqli_error($conn));
   $sum = 0;                               
while(mysqli_fetch_assoc($query)){

$sum +=1;

 }

 return $sum;
 }
 
?>

