<?php

require_once("../database/database.php");

$query =mysqli_query($conn,"SELECT * FROM notification_message ORDER BY notification_id DESC");
$output =' <div class="row" >';
while($result=mysqli_fetch_assoc($query)){
$output .='

     <div class="col-lg-12  text-center ">
      <div class="card text-white bg-danger m-3 "  >
      <div class="card-header  bg-warning">GLOBULA ADMIN</div>
       <div class="card-body">
      <h5 class="card-title text-light">'.$result['notification_header'].'</h5>
     <p class="card-text">'.$result['notification_message'].'</p>
      </div>
     </div>
         </div>
        
       ';
}
$output .=' </div>';


echo $output;





?>

 

