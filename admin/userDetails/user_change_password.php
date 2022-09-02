<?php
if(isset($_POST["new_password"])){


    $user_id =$_POST['user_id'];
 
 
   
     $new_password=$_POST["new_password"];

    require_once("../../Glob/database/database.php");

    $check_querry = mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}'");

    while($result=mysqli_fetch_assoc($check_querry)){
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
      
        $update_querry = mysqli_query($conn," UPDATE login SET password ='{$new_password}'  WHERE user_id ='{$user_id}'");

           if($update_querry){
            echo "Password Updated Successfully";
           }else{
            echo "password Failed To Update";
           }
   


        
    }

 
}




?>