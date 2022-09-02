<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: adminlogin.php");
  }

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Account Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../Glob/images/logo.png">
	
	<link rel="stylesheet" href="../Glob/css/style.css">
<style>
    body{
        background-image: url(../Glob/images/bg_1.jpg);
    }
</style>
	</head>
	<body>
	<?php
include("navigation_settings/navbar.php");
echo $nav;


?>
<section class="ftco-section img bg-hero" style="background-image: url(../Glob/images/bg_1.jpg);">
		<div class="container">
			<div class="row justify-content-center">
				 
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
						 
							
							<div class="col">
								<div class="contact-wrap w-100 p-md-5 p-4">
                         <h6 class=""><b>Send Notification </b></h6>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4"></div>
				            
			
									<form method="POST" name="send_notification" >
										<div class="row">
										 
											<div class="col-md-12"> 
												<div class="form-group">
                                                <input type="text" class="form-control" name="header" id="note_header" placeholder="Notification Header">
												 
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                <input type="text" class="form-control" name="message" id="massage" placeholder="Notification Message">

                                                
												</div>
											</div>
											 
											<div class="col-md-12">
												<div class="form-group">
													<button type="button"  onclick="return send_Notification()"  class="btn btn-primary uploadvideo">Click To Send Notification</button>
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
                             
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
function send_Notification() {
    
  
  var note_header =document.forms["send_notification"]["note_header"].value;
  var note_message =document.forms["send_notification"]["massage"].value;

  if(note_header ==""){
	alert("Please Fill Notification Header");
	return false;
	 
  }
 

   
  if( note_message== ""){
	alert("Please Fill Notification Message");
	return false;

  }

   

  var fd = new FormData();
      
      fd.append('note_header',note_header);
      fd.append('note_message',note_message); 

            
		  $.ajax({
              url: 'notification/send_notification_to_database.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
				alert(response);

 


                 

              },
           });
		 
 
  
}


</script>

 

 
	
<script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script>

 <script src="../Glob/js/jquery.min.js"></script>
  <script src="../Glob/js/popper.js"></script>
  <script src="../Glob/js/bootstrap.min.js"></script>
  <script src="../Glob/js/jquery.validate.min.js"></script>
  

	</body>
</html>

