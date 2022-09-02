<?php



require_once("../database/database.php");

session_start();

if(isset($_POST["address_location"]))
{

 $address_location=$_POST["address_location"];   
$user_id =$_SESSION["user_id"];


$update_query=mysqli_query($conn,"UPDATE login SET location ='{$address_location}'  WHERE user_id ='{$user_id}'");

if($update_query){

   

$upload_query=mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}'");
if($update_query){
    while($result =mysqli_fetch_assoc($upload_query)){
        echo $result["location"];
    }
}else{

    echo "Location Failed";
}



}else{

    echo "Failed To Update Location";
}





}





?>