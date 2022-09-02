<?php

include("../database/database.php");


function fetch_messages_recieved($user_id,$message_to_user_id,$conn){
$query = mysqli_query($conn,"SELECT * FROM chat_message WHERE (message_to_user_id='$user_id' AND message_from_user_id='$message_to_user_id') AND status='1'");


if($query){
    $count=0;
    while(mysqli_fetch_assoc($query)){
    $count +=1;
    }
  return $count;  

} 

}


function fetch_last_message_between_users($user_id,$message_to_user_id,$conn){
    $message = mysqli_query($conn,"SELECT * FROM chat_message WHERE (message_to_user_id='$user_id' AND message_from_user_id='$message_to_user_id') OR (message_to_user_id='$message_to_user_id' AND message_from_user_id='$user_id') ORDER BY message_time DESC LIMIT 1  ");
if($message){

    $text='';

    while($result=mysqli_fetch_assoc($message)){
        $text=$result['chat_message'];
    }

    return $text;
}


}

function fetch_last_time_message_send($user_id,$message_to_user_id,$conn){
    $message = mysqli_query($conn,"SELECT * FROM chat_message WHERE (message_to_user_id='$user_id' AND message_from_user_id='$message_to_user_id') OR (message_to_user_id='$message_to_user_id' AND message_from_user_id='$user_id') ORDER BY message_time DESC LIMIT 1  ");
if($message){

    $text='';

    while($result=mysqli_fetch_assoc($message)){
        $text=$result['message_time'];
    }

    return $text;
}


}




function online_status($user_id,$conn){
    $acctivity="";

    $query = mysqli_query($conn," SELECT * FROM login_details WHERE user_id ='$user_id' ORDER BY last_activity DESC LIMIT 1");
	while($row =mysqli_fetch_assoc($query)){
     $acctivity = $row['last_activity'];
    } 


    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 100 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    
	$status = '';
	
	
    $user_last_activity =  $acctivity;

	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="is_online ml-2"></span>';
	}
	else
	{
		$status = '<span class="is_offline ml-2"></span>';
	}
	 
    return $status;
		  
	 
}










?>