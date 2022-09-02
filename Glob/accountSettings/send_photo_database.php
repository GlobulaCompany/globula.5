<?php


include("../database/database.php");

session_start();


if(isset($_FILES['file']['name'])){
  

      $user_id=$_SESSION['user_id'];
   
       $name = $_FILES['file']['name'];
       $target_dir = "images/";
       $target_file = $target_dir . $_FILES["file"]["name"];
 
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       
       $extensions_arr = array("jpeg","jpg","png","mp4");

       
       if( in_array($extension,$extensions_arr) ){

        
	            $randomno=rand(0,100000);
	            $rename= $_SESSION['username'].date('Ymd').$randomno;

	            $newname=$rename.'.'.$extension;


$query_check = mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$_SESSION['user_id']}'  ");

$user_profile="";

 while($result = mysqli_fetch_assoc($query_check) ) {
 
   $user_profile=$result['user_profile'];

   
 }

 
 if($user_profile == "images/profile.png"){

  if(move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$newname)){
    $video_name ="accountSettings/images/".$newname;
   
    $query_place =mysqli_query($conn," UPDATE login SET user_profile = '$video_name' WHERE user_id='$user_id'");


     

   echo "Photo Uploaded";
    

 }

  }else{



    $user_profile = substr( $user_profile,16);
   



   if(file_exists($user_profile)){

    unlink($user_profile);

    if(move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$newname)){
      $video_name ="accountSettings/images/".$newname;
     
      $query =mysqli_query($conn," UPDATE login SET user_profile = '$video_name' WHERE user_id='$user_id'");


       

     echo "Photo Uploaded";
     





   }



   }else{

    if(move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$newname)){
      $video_name ="accountSettings/images/".$newname;
     
      $query =mysqli_query($conn," UPDATE login SET user_profile = '$video_name' WHERE user_id='$user_id'");


       

     echo "Photo Uploaded";
     





   }




   }








}

              	 
      
 
           
         
             
            





         

       }else{
         echo "Invalid file extension.";
       }
       
   
 
   exit;
}else{

    echo "Your Photo is Not Allowed to be Uploaded It Has A Problem with Size Limit";
}














?>