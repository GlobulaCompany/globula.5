<?php

 

session_start();
require_once("../database/database.php");



 

$like_from_id=$_SESSION['user_id'];
$like_to_id =$_POST['like_to_id'];
$video_id=$_POST['video_id'];
$num_of_likes=1;

$check_like= mysqli_query( $conn,"SELECT * FROM video_likes WHERE like_from_id ='{$like_from_id}' AND video_id='{$video_id}'") or die(mysqli_error($conn));
                                  

if(mysqli_num_rows($check_like)>0){
     while($result = mysqli_fetch_assoc($check_like)){
        $video_count=$result['video_count'];

        $delete_query =mysqli_query($conn,"DELETE FROM  video_likes WHERE  video_count='{$video_count}' ");

        if($delete_query){
            echo "Inserted";
    
        }else{
          echo "Not Insert";
    
        }
        
     }
    
}else{


$query = mysqli_query($conn,"INSERT INTO video_likes(like_from_id,like_to_id,video_id,num_of_likes) 
VALUES('{$like_from_id}' ,'{$like_to_id}','{$video_id}','{$num_of_likes}')");

if($query){
    echo "Inserted";
}else{

    echo "fail";
}




}

?>