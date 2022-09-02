<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location:../index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Edit Video</title>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="images/logo.png">
    
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
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
 <div id="alert">
      </div>
<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">
		<div class="container">
			<div class="row justify-content-center">
				 
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
							
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Edit Details Video</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		 
									<form method="POST" name="myForm"  >
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="title"  value="<?php echo $_GET['title']; ?>" id="title" placeholder="Video Title">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
												<select class="form- control" id="entertainment" aria-label=" ">
                                                     <option selected><?php echo $_GET['entertainment']; ?></option>
                                                     <option value="Music">Music</option>
                                                     <option value="Fun $ Jokes">Fun $ Jokes</option>
                                                      <option value="Movie">Movies</option>
                                                </select>
												</div>
											</div>
											 
											<div class="col-md-12">
												<div class="form-group">
												<input type="text" class="form-control"  value="<?php echo $_GET['description']; ?>"  id="description" placeholder="Give Simple Description of Video">

													 </div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<button type="button" id="uploadvideo" onclick="return validateForm()"  class="btn btn-primary uploadvideo">Click To Update</button>
												 
													<div class="progress mt-3">
                                                   <div class="progress-bar"></div>
                                                     </div>
                                                     


												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100">
									<h3 class="mb-4">Service Center</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Address:</span> Nairobi</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Phone & Whatsapp:</span> <a href="https://wa.me/+254711424207">+254711424207</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Email:</span> <a href="mailto:anidakimtai@gmail.com">namengeian@gmail.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Website</span> <a href="#">GLOBULA</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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





function validateForm() {
  var title = document.forms["myForm"]["title"].value;
  var video_id=<?php echo $_GET['video_id']; ?>;
  var description =document.forms["myForm"]["description"].value;
  var fd = new FormData();
var entertainment =document.forms["myForm"]["entertainment"].value;

  if(title== ""){
 
	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill Title</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
	return false;
  }
 
  if(entertainment =="Select Type Of Entertainment"){
	 
	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Select Entertainment Show</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
	return false;
	 
  } 
  if(description== ""){
	 
	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill Description</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
	return false;

  }         fd.append('video_id',video_id);
            fd.append('description',description);
            fd.append('title',title);
			fd.append('entertainment',entertainment);

			       $.ajax({xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    $(".progress-bar").width(percentComplete + '%');
                                    $(".progress-bar").html(percentComplete+'%');
                                }
                            }, false);
                            return xhr;
                        },
						beforeSend: function(){
                            $(".progress-bar").width('0%');
                            
                        },
              url: 'videoFetch/update_user_video_detail.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response=="Updated Successfully"){
 
                  setInterval(update,5000);
                  function update(){
                    $(".progress-bar").width('0%');
                    $(".progress-bar").html('0%');

                    
                    var message= `
                                <div id = "confirm">
                                    <div class = "message" style="text-align: center;">
                            <span class="text-danger">CONFIRMED MESSAGE</span><br>
                          <span class="text-light" style="font-size:12px;">Update Completed ✔️ !!</span>
                              </div>
                             <button class = "yes" style="color: white;">OK</button>
                            </div>`;

                        $('#alert').html(message);

                        functionAlert();


                    setInterval(success,5000);
                    function success(){
                        relo
                    }


                  }

                  
                 }else{
                    $(".progress-bar").width('0%');
                    $(".progress-bar").html('0%');
                   
					 
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
				 
				 
              },
           });
	 
 
  
}
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

 <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  

	</body>
</html>

