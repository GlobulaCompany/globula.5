<?php
session_start();
include("../database/database.php");

$fetch_user_profile=mysqli_query($conn,"SELECT user_profile FROM login WHERE user_id='".$_SESSION['user_id']."'");
$profile= mysqli_fetch_assoc($fetch_user_profile);
 
?>
<!DOCTYPE html>
 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../resource/hom.css" >
        <script src="../resource/home3.js"></script>
   <script src="../resource/home1.js"  ></script>
   <script src="../resource/home2.js"  ></script>
   <style>
       #confirm {
          position: fixed;
          z-index: 2;
          cursor: pointer;
          display: none;
          background-color: rgba(61, 203, 13, 0.935);
          border: 1px solid #aaa;
          border-radius: 5px;
          width: 350px;
          height: auto;
          left: 50%;
          right: 50%;
          margin-left: -176px;
          padding: 6px 8px 8px;
          box-sizing: border-box;
          text-align: center;
       }
       #confirm button {
          background-color: #255652;
          display: inline-block;
          border-radius: 5px;
          border: 1px solid #aaa;
          padding: 5px;
          text-align: center;
          width: 50px;
          cursor: pointer;
       }
       #confirm .message {
          text-align: left;
       }
    </style>
      
 
<style>
   body{
background-color:#33475b;
overflow-x: hidden;
}

::placeholder {
  color: white;
  opacity: 1;  
}

:-ms-input-placeholder {  
 color: white;
}

::-ms-input-placeholder {  
 color: white;
}
#yes {
    height: 100px;
    background: aqua;
    overflow: auto;
}
</style>

 
 
    </head>
    <body  >

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-warning" href="../chat_room.php" >Return <i class="fa fa-long-arrow-right" style="font-size:20px;color:white;"></i></a></a>
  

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active text-warning" href="../index.php" >Return Home  <i class="fa fa-home" style="font-size:20px;color:white;"></i> </a>
      
    
    </div>
  </div>
</nav>

   
    <div id="alert">
      </div>


    <section class="gradient-custom">
  <div class="container ">
    <div class="row d-flex justify-content-center">

     <div class="col-md-12 m-2 mt-12 col-lg-8 col-xl-8">
        
        <div class="card bg-dark" style="border:2px ;border-radius: 10px;">
<div class="d-flex justify-content-between bg-info  align-items-center  "  >
        <span class=" m-1 text-light">  
          Chat <span class="text-danger"><?php echo $_GET['message_to_user_name']; ?></span>
            </span>
                  <div class="d-flex justify-content-end align-items-center">
                     <span class="small text-danger">   
                     <button type="button" class="btn bg-warning m-1 btn-outline-danger"   onclick="window.location='../chat_room.php'">Close</button> 
        </span>
    </div>
</div>
 
          <div class="card-body p-4 " >
             


            
            
             <div class="row " id="rowcan">
              
   
             <div class="col" id="display_user_chats"  style="height: 370px;overflow: auto;	overflow-x: hidden;">


             
   
              


 
              </div>
            </div>
          </div>
        </div>
        



<div class="d-flex justify-content-between bg-dark align-items-center m-1" style="border:2px ;border-radius: 10px;">
        <span class="m-2 text-primary">
        <form  method="POST" id="send_comment"name="sending_message" class="form-container">  
              <textarea   placeholder="Type Text Message.." id="message" name="message" class="form-controls text-light bg-primary" style="resize: none; overflow-y: hidden; "   ></textarea>
</form>
            </span>
                  <div class="d-flex justify-content-end align-items-center">
                     <span class="small text-danger">   
               <button class="btn btn-outline-warning m-2 " onclick="send_chat()" type="submit"> send</button>
         </span>
    </div>
 </div>


      </div>
    </div>
  </div>
  
</section>



<script >

function functionAlert(msg, myYes) {
          var confirmBox = $("#confirm");
          confirmBox.find(".message").text(msg);
          confirmBox.find(".yes").unbind().click(function() {
             confirmBox.hide();
          });
          confirmBox.find(".yes").click(myYes);
          confirmBox.show();
       }

$(document).ready(function(){
    fetch_user_messages();


 
     
    setInterval(function(){
		fetch_user_messages(); 
	}, 3000);


 function fetch_user_messages()
{ 
    var message_from_user_id="<?php echo $_SESSION['user_id']; ?>";
    var message_to_user_profile="<?php echo $_GET['message_to_user_profile']; ?>";
    var message_from_user_profile="<?php echo $profile['user_profile']; ?>";
    var message_to_user_id="<?php echo $_GET['message_to_user_id']; ?>";
    
 
$.ajax({
type: 'POST',
url: 'chats_components/fetch_user_chats_messages.php',
data:{ message_from_user_id:message_from_user_id,message_to_user_id:message_to_user_id,message_to_user_profile:message_to_user_profile,message_from_user_profile:message_from_user_profile},
success: function(response) {

  
  
  $('#display_user_chats').html(response);
  
  

   
  var elem = document.getElementById('display_user_chats');
     elem.scrollTop = elem.scrollHeight;
   
}


});
}

 
});
</script>


<script>



function send_chat()
{ 
    var message_to_user_name="<?php echo $_GET['message_to_user_name']; ?>";
    var message_to_user_id="<?php echo $_GET['message_to_user_id']; ?>";
    var message_from_user_id="<?php echo $_SESSION['user_id']; ?>";
    var message_from_user_name="<?php echo $_SESSION['username']; ?>";



    var chat_message = document.forms["sending_message"]["message"].value;
   if(chat_message==''){
     
    var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Type somthing..</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
    return false;
   }

 
 
 $.ajax({
type: 'POST',
url: 'chats_components/send_message_to_database.php',
data:{ message_to_user_name:message_to_user_name,message_to_user_id:message_to_user_id,message_from_user_id:message_from_user_id,chat_message:chat_message,message_from_user_name:message_from_user_name},
success: function(response) {
 

  document.getElementById('message').value = ''
  
}
});
}
 



</script>









        
</body>
</html>