<?php

 

session_start();
require_once("../database/database.php");


$subscribe_from_id=$_SESSION['user_id'];
$subscribe_to_id =$_POST['subscribe_to_id'];
$num_of_subscriber=1;

$check_subscriber= mysqli_query( $conn,"SELECT * FROM channel_subscribers WHERE subscribe_from_id ='{$subscribe_from_id}' AND subscribe_to_id='{$subscribe_to_id}'") or die(mysqli_error($conn));
                                  

if(mysqli_num_rows($check_subscriber)>0){
    
   while($result=mysqli_fetch_assoc($check_subscriber)){
    $subscribe_id=$result['subscribe_id'];
    
    $delete_query =mysqli_query($conn,"DELETE FROM channel_subscribers WHERE  subscribe_id ='{$subscribe_id}' ");

    if($delete_query){
        echo "Inserted";

    }else{
      echo "Not Insert";

    }


   }
    
    
}
else{

 

    echo "You Have Not Subscribe";
 

 
}
?>