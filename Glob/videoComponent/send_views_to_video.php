<?php

session_start();
require("../database/database.php");
if (isset($_POST['view_to_id'])){

$view_to_id=$_POST['view_to_id'];
$video_id=$_POST['video_id'];
$view_from_id=$_SESSION['user_id'];

$query_check_view =mysqli_query($conn,"SELECT * FROM video_views WHERE video_id='{$video_id}' AND view_from_id='{$view_from_id}' ");
if(mysqli_num_rows($query_check_view)===0){
$query =mysqli_query($conn,"INSERT INTO video_views (view_from_id,view_to_id,video_id,views_count) VALUES('{$view_from_id}','{$view_to_id}','{$video_id}','1')");

if($query){
   // echo "viewed";
}else{

   // echo "no view";
}
}else{


  //  echo "Already view";
}



 
    

}

?>