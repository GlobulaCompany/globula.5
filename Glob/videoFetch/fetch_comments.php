<?php
 
include("../database/database.php");
$username= $_POST['username'];
$video_id =$_POST['video_id'];
$query =mysqli_query($conn,"SELECT * FROM video_comments WHERE video_id='$video_id' ORDER BY comment_time ASC");


$output ='';
if(mysqli_num_rows($query)>=0){


    while($result=mysqli_fetch_assoc($query)){

        if($result['comment_from_username']==$username)
        {

$output .=' 

 <div class="d-flex flex-start my-3 d-flex justify-content-end">
   
   <div class="flex-grow-1 flex-shrink-1 bg-success" style="border:2px ;border-radius: 10px;">
     <div class="text-white p-2">
       <div class="d-flex justify-content-end bg-dark align-items-center" style="border:2px ;border-radius: 10px;">
         <span class="m-2 text-danger">
           '.$result['comment_from_username'].'&nbsp;&nbsp; 
         </span>
       </div>
       <span style="font-size:17px;" class="small mb-0">
          '.$result['comment_message'].'
       </span>
       <div class="d-flex justify-content-end align-items-center">
       <span class="small"><sub class="text-warning my-1"><b> Time :  '.$result['comment_time'].'</b></sub>  </span>
       </div>
     </div>
   </div>

   <img class="rounded-circle shadow-1-strong me-3" src="resource/profile2.jpg" alt="avatar" width="65" height="65" />

 </div>

 
';

}else{

    
    $output .=' 

    <div class="d-flex flex-start my-3">

    <img class="rounded-circle shadow-1-strong me-3 " src="resource/profile.png" alt="avatar" width="65" height="65" />

      
      <div class="flex-grow-1 flex-shrink-1 bg-success" style="border:2px ;border-radius: 10px;">
        <div class="text-white p-2">
          <div class="d-flex  bg-dark justify-content-between align-items-center" style="border:2px ;border-radius: 10px;">
            <span class="m-2 text-primary f-3">
               '.$result['comment_from_username'].'  
            </span>
            <button class="btn btn-outline-green" onclick="openForm()" > <span class="small"><b class="text-warning">Reply</b><i class="fa fa-reply" style="color:red"></i></span></button>
          </div>
          <span style="font-size:17px;"class="small mb-0">
             '.$result['comment_message'].'
          </span>
       <span class="small"><sub class="text-warning my-1"><b> Time :   '.$result['comment_time'].'</b></sub>  </span>

        </div>
      </div>
   
   
    </div>
   
  
   
   ';

}



}

echo $output;

}else{

   echo $output .'<div class="d-flex flex-end">
   <div class="d-flex justify-content-center align-items-center">
   <lable class="text-success">NO COMMENTS</lable>
   </div>
   </div>
   ';
}










?>