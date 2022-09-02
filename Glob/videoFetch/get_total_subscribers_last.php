<?php


require("../database/database.php");
 
function get_total_subscribers_of_channel($user_id,$conn){
 

$query= mysqli_query( $conn,"SELECT * FROM channel_subscribers WHERE subscribe_to_id='{$user_id}'") or die(mysqli_error($conn));
   $sum = 0;                               
while(mysqli_fetch_assoc($query)){

$sum +=1;

 }

 return $sum;
 }
 
?>
