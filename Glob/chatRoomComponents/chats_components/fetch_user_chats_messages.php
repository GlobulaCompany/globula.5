<?php

include("../../database/database.php");
$message_to_user_id=$_POST['message_to_user_id'];
$message_from_user_id=$_POST['message_from_user_id'];
$message_from_user_profile =  $_POST['message_from_user_profile'];
$message_to_user_profile =$_POST['message_to_user_profile'];

 
$query = mysqli_query($conn,"SELECT * FROM chat_message WHERE (message_from_user_id = '".$message_from_user_id."' AND message_to_user_id = '".$message_to_user_id."') OR (message_from_user_id = '".$message_to_user_id."' AND message_to_user_id = '".$message_from_user_id."') ORDER BY message_time ASC");
$output ='';
$set_message_view =mysqli_query($conn,"UPDATE chat_message SET status = '0' WHERE  (message_from_user_id = '".$message_to_user_id."' AND message_to_user_id = '".$message_from_user_id."') ");

while($result= mysqli_fetch_assoc($query)){

  if($result['message_from_user_id']==$message_from_user_id){

$output .='  <div class="d-flex flex-start my-3 d-flex justify-content-end">
   
<div class="flex-grow-1 flex-shrink-1 bg-success" style="border:2px ;border-radius: 10px;">
  <div class="text-white p-2">
    <div class="d-flex justify-content-end bg-dark align-items-center" style="border:2px ;border-radius: 10px;">
      <span class="m-2 text-danger">
         You &nbsp;&nbsp; 
      </span>
    </div>
    <span style="font-size:17px;" class="small mb-0">
       '.$result['chat_message'].'
    </span>
    <div class="d-flex justify-content-end align-items-center">
    <span class="small"><sub class="text-warning my-1"><b> Time :  '.$result['message_time'].'</b></sub>  </span>
    </div>
  </div>
</div>

<img class="rounded-circle shadow-1-strong me-3" src="../'.$message_from_user_profile.'" alt="avatar" width="65" height="65" />


</div>';

 
  }else{
    $output .='   <div class="d-flex flex-start my-3">

 
    <img class="rounded-circle shadow-1-strong me-3 " src="../'.$message_to_user_profile.'" alt="avatar" width="65" height="65" />

      
      <div class="flex-grow-1 flex-shrink-1 bg-success" style="border:2px ;border-radius: 10px;">
        <div class="text-white p-2">
          <div class="d-flex  bg-dark justify-content-between align-items-center" style="border:2px ;border-radius: 10px;">
            <span class="m-2 text-primary f-3">
               '.$result['message_from_user_name'].'  
            </span>
          </div>
          <span style="font-size:17px;"class="small mb-0">
             '.$result['chat_message'].'
          </span>
      <div class="d-flex justify-content-end align-items-center">
    <span class="small"><sub class="text-warning my-1"><b> Time :  '.$result['message_time'].'</b></sub>  </span>
    </div>

        </div>
      </div>
   
   
    </div>
   ';

    
  }
  

}

echo $output;

























?>