<?php

 

session_start();
require_once("../database/database.php");


$subscribe_from_id=$_SESSION['user_id'];
$subscribe_to_id =$_POST['subscribe_to_id'];
$num_of_subscriber=1;

$check_subscriber= mysqli_query( $conn,"SELECT * FROM channel_subscribers WHERE subscribe_from_id ='{$subscribe_from_id}' AND subscribe_to_id='{$subscribe_to_id}'") or die(mysqli_error($conn));
                                  

if(mysqli_num_rows($check_subscriber)>0){
    
    echo "You have Already Subscribed to channel";
    
}
else{

 
if($subscribe_from_id == $subscribe_to_id){
    
    echo "You Can't Subscribe To Your Own Channel Account";
    
}else{



$query = mysqli_query($conn,"INSERT INTO channel_subscribers(subscribe_from_id,subscribe_to_id,num_of_subscriber) 
VALUES('{$subscribe_from_id}' ,'{$subscribe_to_id}','{$num_of_subscriber}')");

if($query){
    echo "Inserted";
}else{

    echo "fail";
}

}


}

?>