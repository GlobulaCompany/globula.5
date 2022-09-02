<?php

include('database/database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:../index.php");
}

if(isset($_GET['name'])){
 
}

?>
<!DOCTYPE html>
<html>
<head>
<title>GLOBULA COMPANY</title>
<meta charset="UTF-8">
<link rel="icon" href="images/logo.png">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="resource/hom.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  font-size: 15px;
  cursor: pointer;
  user-select: none;
   
}

.fa:hover {
  color: darkblue;
}
</style>
<style>

body{
				background-color:#33475b;
				overflow-x: hidden;
				}
</style>
<style>
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: red;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
<script src="resource/home3.js"></script>
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
     
     body {font-family: Arial, Helvetica, sans-serif;}
     * {box-sizing: border-box;}
      
     .share-button {
       background-color: green;
       color: white;
       padding: 4px 4px;
       border: none;
       cursor: pointer;
       opacity: 0.8;
       position: absolute;
       width: 100px;
       border:2px ;border-radius: 25px;
     }
     .fa:hover{
    opacity: o.5;
    color: yellow;
}
     
      
     .share-popup {
       display: none;
       position: absolute;
       border: 1px solid #f1f1f1;
       z-index: 9;
     }
     
      
     .share-container {
       max-width: 400px;
       padding: 10px;
       background-color: white;
       max-height: 200px;
     }
     
  
     .share-container .btn {
       background-color: #04AA6D;
       color: white;
       padding: 5px 4px;
       border: none;
       cursor: pointer;
       width: 100%;
       margin-bottom:5px;
       opacity: 0.8;
       border:2px ;
       border-radius: 25px;
     }
     
      
     .share-container .cancel {
       background-color: red;
     }
     
      
     .share-container .btn:hover, .share-button:hover {
       border:2px ;border-radius: 25px;
       opacity: 1;
     }
     </style>
</head>
<body >


<?php
include("navbarSettings/navbar.php");
echo $nav;


?>
<?php
include("entertainmentSettings/list_of_entertainments.php");
echo $output;


?>
 <div id="alert">
      </div>


<div class="container">
<div id="result"  ></div>
 </div>






 <script>
 


$(document).on('click', '.share-button', function(){
  var video_id = $(this).data('video_id');
	 
  document.getElementById("share_place"+video_id).style.display = "block";
  
});
$(document).on('click', '.cancel', function(){
  var video_id = $(this).data('video_id');
	 
  document.getElementById("share_place"+video_id).style.display = "none";
  
});





</script>

 
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
 fetch_user();

 function fetch_user()
{var entertainment = "<?php echo $_GET['entertainment']; ?>";
    
    $.ajax({
type: 'POST',
data: {entertainment:entertainment},
url: 'videoFetch/fetch_entertainments_video.php',

success: function(response) {


  $('#result').html(response);
}
});
}

});
</script>


<script>
  


$(document).on('click', '.like_video', function(){
  
  var like_to_id = $(this).data('like_to_id');
		var video_id = $(this).data('video_id');
    $.ajax({
type: 'POST',
url: 'videoComponent/like_video.php',
data:{like_to_id:like_to_id, video_id:video_id},
success: function(response) {
 
 
  if(response =="Inserted"){
  update_video_likes();
  }else{

    

    var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;"> `+response+`</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
  }

 
}
});




function update_video_likes(){
    $.ajax({
type: 'POST',
url: 'videoComponent/get_total_likes.php',
data:{video_id:video_id},
success: function(response) {
  
  
  $('#likes_count_'+video_id).html(response);
  
}
});
  
  }

});



$(document).on('click', '.subscribe_channel', function(){
  var subscribe_to_id = $(this).data('subscribe_to_id');
  var video_id = $(this).data('video_id');


  $.ajax({
type: 'POST',
url: 'videoComponent/subscribe_channel.php',
data:{subscribe_to_id:subscribe_to_id},
success: function(response) {
 
  if(response =="Inserted"){
    update_subscribers_count();
  }else{

    

    var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;"> `+response+`</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
  }
  

 
}
});


		 
function update_subscribers_count(){
    $.ajax({
type: 'POST',
url: 'videoComponent/get_total_subscribers.php',
data:{subscribe_to_id:subscribe_to_id},
success: function(response) {
   
  $('#subscribers_count_'+video_id).html(response);
  
}
});
  
  }
  


});
</script>

<script>


$(document).on('click', '.unsubscribe_channel', function(){
  var subscribe_to_id = $(this).data('unsubscribe_to_id');
  var video_id = $(this).data('video_id');


  $.ajax({
type: 'POST',
url: 'videoComponent/unsubscribe_channel.php',
data:{subscribe_to_id:subscribe_to_id},
success: function(response) {
 
  if(response =="Inserted"){
    
    var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Successfully Unsubscribed</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
    update_subscribers_count();
  }else{

   
    var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;"> `+response+`</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
    
  }
  

 
}
});


		 
function update_subscribers_count(){
    $.ajax({
type: 'POST',
url: 'videoComponent/get_total_subscribers.php',
data:{subscribe_to_id:subscribe_to_id},
success: function(response) {
   
   
  $('#subscribers_count_'+video_id).html(response);
  
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

<script>
  $(document).on('click', '.play', function(){
  var video_id = $(this).data('video_id');
   

     document.getElementById("myVideo_"+video_id).controls = true;
    var vid = document.getElementById("myVideo_"+video_id); 
  vid.play(); 

  // Get all <video> elements.
const videos = document.querySelectorAll('video');

// Pause all <video> elements except for the one that started playing.
function pauseOtherVideos({ target }) {
  for (const video of videos) {
    if (video !== target) {
      video.pause();
    }
  }
}

// Listen for the 'play' event on all the <video> elements.
for (const video of videos) {
  video.addEventListener('play', pauseOtherVideos);
}




		 
  });
</script>

<script>
  $(document).on('click', '.pause', function(){
  var video_id = $(this).data('video_id');

     document.getElementById("myVideo_"+video_id).controls = true;
    var vid = document.getElementById("myVideo_"+video_id); 
    vid.pause(); 
		 
  });
</script>


<script>
    $(document).on('click', '.play', function(){
var video_id = $(this).data('video_id');
var view_to_id = $(this).data('view_to_id');
      
 
$.ajax({
type: 'POST',
url: 'videoComponent/send_views_to_video.php',
data: {video_id:video_id,view_to_id:view_to_id},
success: function(response) {
  update_video_views();
  // alert(response);
  
}
});


function update_video_views(){
    $.ajax({
type: 'POST',
url: 'videoComponent/get_total_views_to_update_page.php',
data:{video_id:video_id},
success: function(response) {
  
  
  $('#views_count_'+video_id).html(response);
  
}
});
  
  }



    });
</script>

<script>
$(document).ready(function(){
    $('.searche input[type="text"]').on("keyup input", function(){
      var username ="";
        
         entertainment="<?php echo $_GET['entertainment']; ?>";
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
         

     
        
            $.get("videoFetch/search_videos_entertainments.php", {searchvalue: inputVal,entertainment:entertainment}).done(
              
                
                function(data){
               
                
				$('#result').html(data);

            }
            
            );
            
        
    });
    
    
     

});
</script>

 
 

<script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script>
</body>
</html> 
