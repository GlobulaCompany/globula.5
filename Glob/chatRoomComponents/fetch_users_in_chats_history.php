<?php

include("chats_components/functions_about_chtas.php");


include("../database/database.php");
$user_id =$_POST['user_id'];

$query =mysqli_query($conn,"SELECT DISTINCT message_to_user_name, message_to_user_id,message_from_user_name,message_from_user_id,chat_message_id FROM chat_message  WHERE message_from_user_id='$user_id' OR message_to_user_id='$user_id' ORDER BY message_time DESC");

 
while($row=mysqli_fetch_assoc($query)){
   
    if($row['message_to_user_id']==$user_id){
        
        $check =mysqli_query($conn,"SELECT * FROM login WHERE user_id='".$row['message_from_user_id']."'");
        $profile_found =mysqli_fetch_assoc($check);
       
$items[$row['chat_message_id']] = array('message_to_user_id' => $row['message_from_user_id'], 'message_to_user_name' =>$row['message_from_user_name'], 'message_to_user_profile' => $profile_found['user_profile'], 'message_count' => fetch_messages_recieved($row['message_to_user_id'],$row['message_from_user_id'],$conn) , 'last_message' => fetch_last_message_between_users($row['message_to_user_id'],$row['message_from_user_id'],$conn), 'last_time' => fetch_last_time_message_send($row['message_to_user_id'],$row['message_from_user_id'],$conn), 'online_status' =>  online_status($row['message_from_user_id'],$conn));

    }else{ 
        $check2 =mysqli_query($conn,"SELECT * FROM login WHERE user_id='".$row['message_to_user_id']."'");
        $profile_found2 =mysqli_fetch_assoc($check2); 
                                                                                                                                                                                                                                                                                                                    

$items[$row['chat_message_id']] = array('message_to_user_id' => $row['message_to_user_id'], 'message_to_user_name' =>$row['message_to_user_name'], 'message_to_user_profile' => $profile_found2['user_profile'], 'message_count' => fetch_messages_recieved($row['message_from_user_id'],$row['message_to_user_id'],$conn), 'last_message' => fetch_last_message_between_users($row['message_from_user_id'],$row['message_to_user_id'],$conn), 'last_time' => fetch_last_time_message_send($row['message_from_user_id'],$row['message_to_user_id'],$conn), 'online_status' =>  online_status($row['message_to_user_id'],$conn));

}
}
 
if(!empty($items)){
$items = array_map("unserialize", array_unique(array_map("serialize", $items)));

echo "<pre>" ;
echo '<table class="table">
	  
<tbody>';
array_map(function ($var) {
    echo ' 
    <tr class="clickable "   onclick="window.location=`chatRoomComponents/chat_to_another_user.php?message_to_user_id='.$var['message_to_user_id'].'&message_to_user_name='.$var['message_to_user_name'].'&message_to_user_profile='.$var['message_to_user_profile'].' ` "">
    <td width="10%" ><img class="rounded-circle shadow-1-strong me-3" src="'.$var['message_to_user_profile'].'" alt="avatar" width="65" height="65" /></td>';
   
    $word=  (strlen($var['last_message']) > 13) ? substr($var['last_message'],0,10).'...' : $var['last_message'];
    
   if($var['message_count']>0 ){
   echo ' <td width="40%" class="text-light"  >'.$var['message_to_user_name'].''.$var['online_status'].' <p > <span class="badge badge-success text-light">'.$var['message_count'].'</span> <p style="color:grey;"> '.$word.' <sub><span class="text-info">'.$var['last_time'].' </span></sub></p></p></td>
          
     ';
   }else{
    echo ' <td width="40%" class="text-light"  >'.$var['message_to_user_name'].''.$var['online_status'].' <p > <span class="badge badge-success text-light"></span> <p style="color:grey;"> '.$word.' <sub><span class="text-info">'.$var['last_time'].' </span></sub></p></p></td>
         
     ';
    
   }
   echo '</tr>';

    
     
     

}, $items);
 
echo  '</tbody>
</table>
 ';

}else{
  echo '<table class="table" id="myTable">
	  
  <tbody><tr> <td width="100%" style="text-align:center; color:white;">No Chat History Available Click <i> Search New Friends </i></td></tr>
  </tbody>
</table>';






}






?>