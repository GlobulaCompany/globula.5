<?php

include('../..//Glob/database/database.php');

session_start();

 

if(isset($_POST['admin_password']))
{
    $admin_password =$_POST['admin_password'];
    $admin_username=$_POST['admin_username'];
	 
$query = mysqli_query($conn,"SELECT * FROM admin WHERE admin_username='{$admin_username}' AND admin_password='{$admin_password}' ");

if(mysqli_num_rows($query)===0){
    echo "Wrong Credentials";
}else{
	
		
   while( $result = mysqli_fetch_assoc($query) ) {
	
        $_SESSION['admin_username']=$result['admin_username'];
        $_SESSION['admin_id']=$result['admin_id'];
		 
		 echo "Success";
		
		
        
   }
        
    
}
}	 

?>