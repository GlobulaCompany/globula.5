<?php
 
 
 include("../../database/database.php");
 
if(isset($_REQUEST["searchvalue"])){
     
    $search= $_REQUEST["searchvalue"];
    $username=$_REQUEST["username"];

    if(empty($search)){


          
   
     $resultuser=mysqli_query($conn,"SELECT * FROM `login` WHERE  username!='$username'");

     $output ='<table class="table" id="myTable">
	  
     <tbody>';
     if(mysqli_num_rows($resultuser)===0){

        $output.= '<tr> <td width="100%" style="text-align:center; color:white;">No Username Available </td></tr>'; 
        
    }else{

        while($result = mysqli_fetch_assoc($resultuser)){
    
            $output .=' 
<tr class="clickable "   onclick="window.location=`chat_to_another_user.php?message_to_user_id='.$result['user_id'].'&message_to_user_name='.$result['username'].'&message_to_user_profile='.$result['user_profile'].' ` "">
<td width="10%" ><img class="rounded-circle shadow-1-strong me-3" src="../'.$result['user_profile'].'" alt="avatar" width="65" height="65" /></td>
<td class="text-light"  > '.$result['username'].'</td>
</tr>
';
   
        }


     }

     $output .='</tbody>
</table>
 ';


echo $output;



    }else{


          
   
     $resultuser=mysqli_query($conn,"SELECT * FROM `login` WHERE username LIKE '%$search%' AND username!='$username'");

     $output ='<table class="table" id="myTable">
	  
     <tbody>';
     if(mysqli_num_rows($resultuser)===0){

        $output.= '<tr> <td width="100%" style="text-align:center; color:white;">No Username Available </td></tr>'; 
        
    }else{

        while($result = mysqli_fetch_assoc($resultuser)){
    
            $output .=' 
<tr class="clickable "   onclick="window.location=`chat_to_another_user.php?message_to_user_id='.$result['user_id'].'&message_to_user_name='.$result['username'].'&message_to_user_profile='.$result['user_profile'].' ` "">
<td width="10%" ><img class="rounded-circle shadow-1-strong me-3" src="../'.$result['user_profile'].'" alt="avatar" width="65" height="65" /></td>
<td class="text-light"  > '.$result['username'].'</td>
</tr>
';
   
        }


     }

     $output .='</tbody>
</table>
 ';


echo $output;



    }

    
  
}
 
 
 
?>
