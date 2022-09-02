<?php

$output='';

require_once("videoComponent/get_total_subscribers_last.php");
require_once("database/database.php");

$user_id =$_SESSION['user_id'];

$fetch_user_details=mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}'");
while($result=mysqli_fetch_assoc($fetch_user_details)){

$output.='<div class="info-wrap w-100">
<h3 class="mb-4">Personal Details </h3>
<img class="rounded-circle shadow-1-strong m-4" src=" '.$result['user_profile'].'" alt="avatar" width="95" height="95" />
<div class="dbox w-100 d-flex align-items-start">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-globe"></span>
</div>
<div class="text pl-4">
<p><span>Username:</span>'.$result['username'].'</p>';
 
$output .='<p> <b  class="text-danger">Subscribers</b> :  <b class="text-success">'.get_total_subscribers_of_channel($user_id,$conn).'</b> </p>

</div>
</div>
<div class="dbox w-100 d-flex align-items-start">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-map-marker "></span>
</div>
<div class="text pl-4">';
if(!empty($result['location'])){ 
$output .='<p><span>Address:</span><i class="locationUpdate"> '.$result['location'].'</i></p>';
}else{
    $output .='<p><span>Address:</span>No location</p>';
  
}

$output .='</div>
</div>
<div class="dbox w-100 d-flex align-items-start">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-phone"></span>
</div>
<div class="text pl-4">';
if(!empty($result['phone'])){ 
    $output .='<p><span>Phone:</span><i class="telphoneUpdate" > '.$result['phone'].'</i></p>';
    }else{
        $output .='<p><span>Phone:</span>No Phone</p>';
      
    }
 
$output .='</div>
</div>
<div class="dbox w-100 d-flex align-items-start">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-paper-plane"></span>
</div>
<div class="text pl-4">';
if(!empty($result['email'])){ 
    $output .='<p><span>Email:</span><i class="emailsUpdate" > '.($result['email']).'</i></p>';
    
    }else{
        $output .='<p><span>Email:</span>No Email</p>';
      
    }
 
$output .='</div>
</div>

</div>';
}

 


?>