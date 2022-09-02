<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Chat Room </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="resource/hom.css" >
   
<script src="resource/home3.js"></script>

<script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script>
<style>

body{
background-color:#33475b;
overflow-x: hidden;
}
</style>
<style>
.is_online {
  height: 12px;
  width: 12px;
  background-color: green;
  border-radius: 50%;
  display: inline-block;
}
.is_offline {
  height: 12px;
  width: 12px;
  background-color: red;
  border-radius: 50%;
  display: inline-block;
}
</style>
 

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

</head>
<?php
include("navbarSettings/navbar.php");
echo $nav;


?>


<body>

  <div class="container">
	<div class="row">
		<div class="col">
  
 
     <div class="d-flex justify-content-between bg-dark align-items-center m-3" style="border:2px ;border-radius: 10px;">
              
	 <span class="m-2 text-primary"  ><span class="text-light" >Hello !! </span> <br> <?php echo $_SESSION['username']; ?> 👋</span>
   <div id="alert">
      </div>
         <div class="d-flex justify-content-end align-items-center mr-2  searche">
            <span class="small text-danger">
      <button class="btn btn-outline-warning mt-1" type="submit"><a href="chatRoomComponents/search_users_to_chat.php" style="color:yellow;">Search New Friends </a></button>
      <a href="chatRoomComponents/search_users_to_chat.php">
      <i class='fa fa-address-card-o' style='font-size:20px; margin-top:10px; color:white'></i>
      <i class="fa fa-angle-double-right" style="font-size:20px;color:white"></i></a>

      <input type="text" class="form-control mt-1" placeholder="Search Chat History" >  
        
   </span>
        </div>



		
     </div>



	

 
	   <div class="bg-dark" style="border:2px ;border-radius: 15px; ">

	  <table class="table">
	  
	  <tbody>
		   
	     <div id="display_user_history_chats"></div>
		
	  </tbody>
	</table>

	</div>

	</div>
	</div>
 </div>
 

 
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


       
       function logout_user_message(){
        var username ="<?php echo $_SESSION['username']; ?>"
        var message= `
                                <div id = "confirm">
                                    <div class = "message" style="text-align: center;">
                            <span class="text-danger">CONFIRMED MESSAGE</span><br>
                          <span class="text-light" style="font-size:12px;">Hello `+username+` !! <br> Successfully Logged Out !!</span>
                              </div>
                             <button class = "yes" style="color: white;">OK</button>
                            </div>`;

                        $('#alert').html(message);

                        functionAlert();
                     setTimeout(redirecting, 3000);
                        function redirecting() {

                          location.replace("Logout/logout.php")
                         
                              }
    
       }




$(document).ready(function(){
    fetch_user_history_chats();
	update_online_status_time();
     
 
    setInterval(function(){
		fetch_user_history_chats(); 
	}, 5000);


 function fetch_user_history_chats()
{ var user_id ="<?php echo $_SESSION['user_id']; ?>"
	 

 
 $.ajax({
type: 'POST',
url: 'chatRoomComponents/fetch_users_in_chats_history.php',
data:{user_id:user_id},
success: function(response) {


  $('#display_user_history_chats').html(response);
}
});
}
 
	 


function update_online_status_time()
{  
	 

 $.ajax({
type: 'POST',
url: 'accountSettings/update_online_status_to_database.php',
success: function(response) {


   
}
});
}

 
});
</script>


<script>
$(document).ready(function(){
    $('.searche input[type="text"]').on("keyup input", function(){
      
        
       var  user_id="<?php echo $_SESSION['user_id']; ?>";
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");

     
        
            $.get("chatRoomComponents/search_fetch_user_in_chat_history.php", {searchvalue: inputVal,user_id:user_id}).done(
              
                
                function(data){
               
                
				$('#display_user_history_chats').html(data);

            }
            
            );
            
        
    });
    
    
     

});
</script>
	
</body>
</html>
