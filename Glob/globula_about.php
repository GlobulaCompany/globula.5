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
  	<title> About Globula</title>
	
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

<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">

		<div class="container">
			<div class="row justify-content-center">
				 
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
							
							 
							<div class="col ">
								<div class="info-wrap w-100">
									<h3 class="mb-4 text-success">GLOBULA</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa  "></span>
				        		</div>
				        		<div class="text pl-4">
								<div id="alert">
      </div>
					            <p class="text-primary">Globula About :</p>
                                <p>
                          Globula company, is a platform with three major sections:</p>
                          <p>
                           <ul>
                            <li class="text-warning" >Entertainment</li>
                            <li class="text-warning">Chatroom</li>
                            <li class="text-warning">language translation</li>
                           </ul>
                           </p>
                       
                           <p>
                           <ul  > <ul>
                            <li  class="text-warning" >Details :
                                <ul>
                                    <li class="text-success">Entertainment :</li>
                                    <li class="text-light">The entertainment section allows you to :<br>
                                     <ol type="i">
                                        <li><i>upload video content and get paid.</i></li>
                                        <li> <i>it also allows advertisers to self-advertise their <br>
                                         products on payment of a monthly or yearly subscription.</i></li>

                                     </ol>  </li> 

                                     <li class="text-success">Chatroom :</li>
                                     <li class="text-light" >Our chatroom allows you to: <br>
                                     <ol type="i">
                                        <li><i> We Offer a group chat</i></li>
                                        <li> <i> We Offer conversation between two people</i></li>

                                     </ol> 
                                    
                                    
                                    
                                    </li>
                         
                                    </li>
                                </ul>
                            </li>
                            </ul> 
                           </ul>
                           </p>
                      
					          </div>
				          </div>
                          <h3 class="mb-4 text-success"> COMING SOON</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa  "></span>
				        		</div>
				        		<div class="text pl-4">
                                <p class="text-primary">Coming soon Events </p>


                                <p>
                           <ul>
                            <li class="text-warning" >The audio language translation.</li>
                            <li class="text-warning">The video chat.</li>
                            <li class="text-warning">We shall also provide language translation

                            <ul>
                                
                                <li class="text-primary"> The language translation section will also have :</li>
                              <ol type="i">
                              <li class="text-light"><i> an online class for foreign languages, <br>
                               which will allow one to speak his or her language and <br>
                      translate to a different language in written form.</i></li>

                              </ol>
                               
                            </ul>
                            </li>
                           </ul>
                           </p>
					         <p> <ul><li><h5 class="text-success"> Our priority is client satisfaction.</h5></li></ul></p>  
					          </div>
				          </div>

                        
				        	 
				        	 
				        	 
			          </div>
							</div>
						</div>
					</div>

                   
								<div class="info-wrap w-100">
									<h3 class="mb-4">Service Center</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Telegram:</span><a href="https://t.me/@namengeian">+254711424207</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Whatsapp Number:</span> <a href="https://wa.me/+254711424207">+254711424207</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Email:</span> <a href="mailto:namengeian@gmail.com">namengeian@gmail.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>facebook</span> <a href="https://www.facebook.com/ian.stephen.520">Facebook</a></p>
					          </div>
				          </div>
			          </div>
							 
				</div>
			</div>
		</div>
	</section>
    
    
<script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script>

 <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
 
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
  

	</body>
</html>

