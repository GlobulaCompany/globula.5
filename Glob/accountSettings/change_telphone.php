<?php



require_once("../database/database.php");

session_start();

if(isset($_POST["tel_phone"]))
{

 $tel_phone=$_POST["tel_phone"];   
$user_id =$_SESSION["user_id"];

$update_query=mysqli_query($conn,"UPDATE login SET phone ='{$tel_phone}'  WHERE user_id ='{$user_id}'");

if($update_query){

   

$upload_query=mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$user_id}'");
if($update_query){
    while($result =mysqli_fetch_assoc($upload_query)){
        echo $result["phone"];
    }
}else{

    echo "Phone Failed";
}



}else{

    echo "Failed To Update Phone";
}





}





?>