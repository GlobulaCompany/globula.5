<?php
require("../database/database.php");
if(isset($_POST['subscribe_to_id'])){
$subscribe_to_id=$_POST['subscribe_to_id'];
 

$query= mysqli_query( $conn,"SELECT * FROM channel_subscribers WHERE subscribe_to_id='{$subscribe_to_id}'") or die(mysqli_error($conn));
   $sum = 0;                               
while(mysqli_fetch_assoc($query)){

$sum +=1;

 }

 echo $sum;

}
?>

