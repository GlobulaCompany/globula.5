<?php



require_once("../../Glob/database/database.php");

 

if(isset($_POST["email"]))
{

 $email=$_POST["email"];   
$user_id =$_POST["user_id"];

$update_query=mysqli_query($conn,"UPDATE login SET email ='{$email}'  WHERE user_id ='{$user_id}'");

if($update_query){

   

$upload_query=mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}'");
if($update_query){
    while($result =mysqli_fetch_assoc($upload_query)){
        echo $result["email"];
    }
}else{

    echo "Email Failed";
}



}else{

    echo "Failed To Update Email";
}





}





?>