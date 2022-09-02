<?php
require("../database/database.php");
if(isset($_POST['video_id'])){
$video_id=$_POST['video_id'];
 

$query= mysqli_query( $conn,"SELECT * FROM video_views WHERE video_id='{$video_id}'") or die(mysqli_error($conn));
   $sum = 0;                               
while(mysqli_fetch_assoc($query)){

$sum +=1;

 }

 echo $sum;

}
?>

