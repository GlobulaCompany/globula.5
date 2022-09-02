<?php
require_once("../database/database.php");
if(isset($_POST['video_id'])){

    $video_id=$_POST['video_id'];
    $title=$_POST['title'];
    $description =$_POST['description'];
    $entertainment=$_POST['entertainment'];
 
 
 

$stmt = $conn->prepare("UPDATE video SET title=?, description=? ,entertainment=? WHERE video_id=?");

$stmt->bind_param('ssss', $title, $description, $entertainment,$video_id);
 


if($stmt->execute()){

    echo "Updated Successfully";

}else{

    echo "Fail To Update";


}


     
}




?>