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
						<div class="col-lg-6 d-flex align-items-stretch">
							<?php
              
							require_once("resource/userdetails.php");
							echo $output;
							?>
							</div>
							
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">
                <h6 class=""><b>Change password</b></h6>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4"></div>
				            
			
									<form method="POST" name="password_change" >
										<div class="row">
										 
											<div class="col-md-12"> 
												<div class="form-group">
                                                <input type="text" class="form-control" name="password" id="new_password" placeholder="New Password">
												 
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                <input type="text" class="form-control" name="password" id="con_password" placeholder="Confirm New Password">

                                                
												</div>
											</div>
											 
											<div class="col-md-12">
												<div class="form-group">
													<button type="button"  onclick="return changepassword()"  class="btn btn-primary uploadvideo">Click To Change Password</button>
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
                                    <h6 class=""><b>Update Email Address</b></h6>
                                    <form method="POST" name="change_email"  >
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
												</div>
											</div>
											 
											 
											 
											<div class="col-md-12">
												<div class="form-group">
													<button type="button"  onclick="return changeemail()"  class="btn btn-primary uploadvideo">Click To Change Email</button>
													 
												</div>
											</div>
										</div>
									</form>
                                    <h6 class=""><b>Update Telphone</b></h6>
                                    <form method="POST" name="change_telphone"  >
										<div class="row">
											 
											<div class="col-md-12"> 
												<div class="form-group">
                                                <input type="number" class="form-control" name="tel_number" id="tel_number" placeholder="Tel Phone Number i.e 0723..">
												 
												</div>
											</div>
											 
											 
											<div class="col-md-12">
												<div class="form-group">
													<button type="button"  onclick="return changetelphone()"  class="btn btn-primary uploadvideo">Click To Change Telphone</button>
													 
												</div>
											</div>
										</div>
									</form>
                                    <h6 class=""><b>Update Location</b></h6>
                                    <form method="POST" name="change_location"  >
										<div class="row">
											 
											<div class="col-md-12">
												<div class="form-group">
                                                <input type="text" class="form-control" name="address_location" id="address_location" placeholder="Address Location i.e Nairobi">

                                                
												</div>
											</div>
											 
											<div class="col-md-12">
												<div class="form-group">
													<button type="button"  onclick="return changelocation()"  class="btn btn-primary uploadvideo">Click To Update Location</button>
													 
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
function changepassword() {
    
  
  var new_password =document.forms["password_change"]["new_password"].value;
  var con_password =document.forms["password_change"]["con_password"].value;
 

   
  if(new_password ==""){
	alert("Please Fill New Password");
	return false;
	 
  }
 

   
  if(con_password== ""){
	alert("Please Fill Confirm Password");
	return false;

  }

  if(new_password != con_password){

    alert("New Password Don't Match Confirm Password");
    return false;
  }

  var fd = new FormData();
      
			fd.append('new_password',new_password);
      fd.append('user_id',<?php echo $_GET['user_id']; ?>); 

            
		  $.ajax({
              url: 'userDetails/user_change_password.php',
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

<script>
    
function changeemail() {
    
    var email = document.forms["change_email"]["email"].value;
  
    if(email ==""){
      alert("Please Fill Email");
      return false;
    }
    var fd = new FormData();
              fd.append('email',email);
      fd.append('user_id',<?php echo $_GET['user_id']; ?>); 

              
              
            $.ajax({
                url: 'userDetails/user_change_email.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                   alert(response);
                   if(response=email){

                    alert("Email Successfully Changed");
                     
                 location.reload();
                    $('.emailsUpdate').html(response);
                   }
                },
             });
           
   
    
  }


</script>

<script>
    
function changetelphone() {
    
    var tel_phone = document.forms["change_telphone"]["tel_number"].value;
 
    if(tel_phone ==""){
      alert("Please Fill Telphone NUmber");
      return false;
    }
    var fd = new FormData();
              fd.append('tel_phone',tel_phone);
      fd.append('user_id',<?php echo $_GET['user_id']; ?>); 

              
              
            $.ajax({
                url: 'userDetails/user_change_telphone.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                   alert(response);
                   if(response=tel_phone){

                    alert("Telphone Successfully Changed");
                    location.reload();
                    $('.telphoneUpdate').html(response);
                   }
                },
             });
           
   
    
  }


</script>

<script>
    
function changelocation() {
    
    var address_location = document.forms["change_location"]["address_location"].value;
  
    if(address_location ==""){
      alert("Please Fill You Location");
      return false;
    }
    var fd = new FormData();
              fd.append('address_location',address_location);
      fd.append('user_id',<?php echo $_GET['user_id']; ?>); 
              
              
            $.ajax({
                url: 'userDetails/user_change_address_location.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                   alert(response);
                   if(response=address_location){

                    alert("Location Successfully Changed");
                    location.reload();

                    $('.locationUpdate').html(response);
                   }
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

