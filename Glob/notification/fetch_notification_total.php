<?php

require("database/database.php");
function notification_Update($user_id,$conn){

$query=mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}' ");
$note_count=0;
while($result= mysqli_fetch_assoc($query)){

$note_count=$result['notification_status'];


}

return $note_count;

}












?>