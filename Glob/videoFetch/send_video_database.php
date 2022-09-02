<?php


include('../database/database.php');

session_start();


  
 
if(isset($_POST['description'])){
   $username = $_SESSION['username'];
   $user_id =$_SESSION['user_id'];
   $entertainment =$_POST['entertainment'];
   $title =$_POST['title'];
   $description =$_POST['description'];
   

  
   
       $name = $_FILES['file']['name'];
       $target_dir = "upload/";
       $target_file = $target_dir . $_FILES["file"]["name"];
 
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       
       $extensions_arr = array("mp4","avi","3gp","mov","mkv","mpeg");

       
       if( in_array($extension,$extensions_arr) ){

         
         $randomno=rand(0,100000);

         function random_strings($length_of_string){
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  
          return substr(str_shuffle($str_result),
                       0, $length_of_string);
         }
         $str_num = random_strings(10);
         $rename=  $randomno.$str_num.date('Ymd');

         $newname =$rename.'.'.$extension;
 
           
         
             
             if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$newname)){
                $video_name ="videoFetch/upload/".$newname;
                

 

               
$stmt = $conn->prepare("INSERT INTO video (video_name,username,user_id,entertainment,title,description,video_code) VALUES (?, ?, ?,?,?,?,?)");
$stmt->bind_param("sssssss", $video_name ,$username ,$user_id,$entertainment,$title,$description,$rename);

$stmt->execute();



$stmt->close();
$conn->close();

echo "Upload Completed Successfully !!";


              

             }
         

       }else{
         echo "Invalid file extension.";
       }
    
   
 
   
}else{

    echo "Your Video is Not Allowed to be Uploaded It Has A Problem with Size Limit";
}
?>
 