<?php

require_once("../database/database.php");
if(isset($_POST['delete_video_id'])){
    $delete_video_id=$_POST['delete_video_id'];


    $query_check = mysqli_query($conn,"SELECT * FROM video WHERE video_id='{$delete_video_id}' ");

    $video_name="";

    while($result = mysqli_fetch_assoc($query_check) ) {
 
        $video_name=$result['video_name'];
     
        
      }

$video_name = substr( $video_name,11);
$query="";

if(file_exists($video_name)){
    unlink($video_name);

$query=mysqli_query($conn,"DELETE FROM video WHERE  video_id ='{$delete_video_id}' ");

}else{

$query=mysqli_query($conn,"DELETE FROM video WHERE  video_id ='{$delete_video_id}' ");


}

if($query){

    echo "video Deleted Successfully ";
}else{

    echo "video Has Not Been Deleted";

}

}else{

    echo "Error";
}




?>