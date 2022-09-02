<?php

require_once("../database/database.php");
session_start();
if(isset($_POST["old_password"])){


    $user_id =$_SESSION['user_id'];

   $old_password=$_POST["old_password"];
   
     $new_password=$_POST["new_password"];


    $check_querry = mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}'");

    while($result=mysqli_fetch_assoc($check_querry)){
        
        if (password_verify($old_password, $result["password"])) {
          $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            
       $update_querry = mysqli_query($conn," UPDATE login SET password ='{$new_password}'  WHERE user_id ='{$user_id}'");

           if($update_querry){
            echo "Password Updated Successfully";
           }else{
            echo "password Failed To Update";
           }
   


        } else {
            echo "Old Passwords Don't Match";
        }
    }

 
}




?>