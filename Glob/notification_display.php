<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Notification Center</title>
<meta charset="UTF-8">
<link rel="icon" href="../Glob/images/logo.png">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="resource/hom.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="resource/jquery.min.js"></script>
 

<style>
 
body{
				background-color:#33475b;
				
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
<body >

<?php
include("navbarSettings/navbar.php");
echo $nav;


?>
 
<div class="container  d-flex justify-content-center">
<div id="alert">
      </div>
 
<div id="notification_message"></div>

</div>


<div class="container  d-flex justify-content-center">
 
 

</div>

 
 
 

 
<script>



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
fetch_new_notification_message();

setInterval(function(){
fetch_new_notification_message();
	 
	}, 1000);

function fetch_new_notification_message(){
$.ajax({
type: 'POST',
url: 'notification/fetch_new_notification_message.php',
 
success: function(response) {
  
  
  $('#notification_message').html(response);
  
}
});


}


});
</script>
<script>
  	$(document).on('click', '.open_notification', function(){
		$.ajax({
				url:"notification/open_notification.php",
				method:"POST",
			 
				success:function(data)
				{
         
				}
			})
		 
			
		 
	});
</script>

<script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script>
 
</body>
</html> 
