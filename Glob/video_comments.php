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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="resource/home3.js"></script>
<link rel="stylesheet" href="resource/hom.css" >
<script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script> 
<style>
     
     body {font-family: Arial, Helvetica, sans-serif;}
     * {box-sizing: border-box;}
      
     .share-button {
        
      background-color: green;
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
  <style>
    body{
        background-color:#33475b;
    }
  </style>
  <style>
     
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
 
.open-button {
  background-color: #555;
  color: white;
  padding: 4px 4px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 130px;
  border:2px ;border-radius: 25px;
}

 
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 1px solid #f1f1f1;
  z-index: 9;
}

 
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

 
.form-container textarea {
  width: 100%;
  padding: 8px;
  margin: 2px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 70px;
}
 
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}
 
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 8px 4px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:5px;
  opacity: 0.8;
  border:2px ;
  border-radius: 25px;
}

 
.form-container .cancel {
  background-color: red;
}

 
.form-container .btn:hover, .open-button:hover {
  border:2px ;border-radius: 25px;
  opacity: 1;
}
</style>
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
<body>
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

    <section class="gradient-custom">
  <div class="container ">
    <div class="row d-flex justify-content-center">

    <div id="diplay_video"  ></div>

      <div class="col-md-6 mt-3 col-lg-6 col-xl-6">
        
        <div class="card bg-dark" style="border:2px ;border-radius: 10px;">
          <div class="card-body p-4">
            <div class="bg-primary " style="border:2px ;border-radius: 10px;">
            <h4 class="text-center mb-4 p-2 text-light"> Video Comments</h4>
            </div>
             <div class="row ">
              <div class="col"  id="scroll_down" style="height: 400px;overflow: scroll;	overflow-x: hidden;">

              <div id="display_comments"></div>
   
              
<div class="chat-popup " id="myForm">
   <form  method="POST" id="send_comment"name="commeting_to_video" class="form-container bg-dark">
   <div class="bg-primary " style="border:2px ;border-radius: 10px;">

   <h5 class="text-light p-1 text-center">Comment </h5>
</div>
   
   <label for="msg" class="text-success"><b>Say something...</b></label>
     <textarea placeholder="Leave a comment ..." name="comment"  id="message"></textarea>
   
      <button type="button" onclick="send_comment()" class="btn">Send</button>

    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
      
   </div>

 
              </div>
            </div>
          </div>
        </div>

<button class="open-button  " onclick="openForm()"><span class="text-warning">COMMENT</span></button>


      </div>
    </div>
  </div>
</section>




 

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

$(document).ready(function(){
    fetch_commented_video();
    fetch_comments();


    


 function fetch_commented_video()
{ 


var video_id ="<?php echo $_GET['video_id']; ?>";
    
    $.ajax({
type: 'POST',
url: 'videoFetch/fetch_commented_video.php',
data:{video_id:video_id},
success: function(response) {


  $('#diplay_video').html(response);
}
});
}

function fetch_comments()
{ 


var video_id ="<?php echo $_GET['video_id']; ?>";
var username ="<?php echo $_SESSION['username']; ?>";

    
    $.ajax({
type: 'POST',
url: 'videoFetch/fetch_comments.php',
data:{video_id:video_id,username:username},
success: function(response) {


  $('#display_comments').html(response);

  var elem = document.getElementById('scroll_down');
  elem.scrollTop = elem.scrollHeight;

}
});
}




});
</script>
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






function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function send_comment(){
    var comment_message =  document.forms["commeting_to_video"]["comment"].value;
    var comment_to_username="<?php echo $_GET['video_owener']; ?>";
    var video_id ="<?php echo $_GET['video_id']; ?>";
    var comment_from_username ="<?php echo $_SESSION['username']; ?>";
    
    if(comment_message ==""){
	 
  	 
	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Type Something...</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
	return false;
  }

  $.ajax({
type: 'POST',
url: 'videoFetch/send_comment_database.php',
data:{video_id:video_id,comment_message:comment_message,comment_from_username:comment_from_username,comment_to_username:comment_to_username},
success: function(response) {


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
    setTimeout(redirecting, 2000);
                          function redirecting() {

                            document.getElementById('message').value = ''
                           
                                }
  
  
   
 
 
}
});



 

}


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
        <span class="text-light" style="font-size:12px;">`+response+`</span>
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
        <span class="text-light" style="font-size:12px;">`+response+`</span>
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
        <span class="text-light" style="font-size:12px;">`+response+`</span>
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

 

       
    </body>
 </html>