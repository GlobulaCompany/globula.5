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
  	<title>Account Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/logo.png">
	
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
						<div class="col-lg-6 d-flex align-items-stretch">
							<?php
							require_once("accountSettings/userdetails.php");
							echo $output;
							?>
							</div>
							
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">

								<div class="bg-success">
                                     <hr>
									 </div>

									<ul  style="list-style-type:square; color:green"><li class="text-danger ">Change Password  </li></ul>
									<h6 class="mb-4"> </h6>
									<div id="form-message-warning" class="mb-4"></div> 
				      		     <div id="form-message-success" class="mb-4"></div>
				            
			
									<form method="POST" name="password_change" >
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
												</div>
											</div>
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

									<div class="bg-success">
                                     <hr>
									 </div>
									 
									 <ul  style="list-style-type:square; color:green"><li class="text-danger">Update Profile Photo </li></ul>

	                                  <form method="POST" name="changephoto"  >
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="file" class="form-control" name="file" id="file"  >
												</div>
											</div>
											<ul style="list-style-type:circle;" ><li class="text-info "><span class="fs-6">Upload Size Accepted Less Than 1 MBS</span></li></ul>


											 
											 
											<div class="col-md-12">
												<div class="form-group">
													<button type="button"  onclick="return change_photo()"  class="btn btn-primary ">Click To Change Photo</button>
													 
												</div>
											</div>
											
											<div class="progress m-3 w-100">
                                            <div class="progress-bar"></div>
                                            </div>
											<div id="success_message" class="text-success"></div>
											
										</div>
									</form>

									<div class="bg-success">
                                     <hr>
									 </div>

									 <ul  style="list-style-type:square; color:green"><li class="text-danger">Update Email Address</li></ul>
  
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

									<div class="bg-success">
                                     <hr>
									 </div>


									 <ul  style="list-style-type:square; color:green"><li class="text-danger">Update Telphone</li></ul>

 
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


									<div class="bg-success">
                                     <hr>
									 </div>


									 <ul  style="list-style-type:square; color:green"><li class="text-danger">Update Location</li></ul>

                                     
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

									<div class="bg-success">
                                     <hr>
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




	function change_photo(){
		 
  var fd = new FormData();
   var files = $('#file')[0].files;

 if(files.length > 0 ){
			
			fd.append('file',files[0]);
			
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
              url: 'accountSettings/send_photo_database.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 
				 if(response=="Photo Uploaded"){
					setInterval(update,5000);
                  function update(){
                    $(".progress-bar").width('0%');
                    $(".progress-bar").html('0%');
                    $('#success_message').html("Update Completed ✔️");
                    setInterval(success,5000);
                    function success(){
                        $('#success_message').html(""); 
						 
                        location.reload(); 
                    }


                  }
				 }else{
					
					$(".progress-bar").width('0%');
                  $(".progress-bar").html('0%');
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
				 
              },
           });
		}else{
			var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Select Photo </span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
}
 
	}

	
 

</script>









	<script>
function changepassword() {
    
  var old_password = document.forms["password_change"]["old_password"].value;
  var new_password =document.forms["password_change"]["new_password"].value;
  var con_password =document.forms["password_change"]["con_password"].value;
 

  if(old_password ==""){

	 
	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill Old Password</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();

	return false;
  }
 
  if(new_password ==""){
 
	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill New Password</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();

	
	return false;
	 
  }
 

   
  if(con_password== ""){
	 


	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill Confirm Password</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
	return false;

  }

  if(new_password != con_password){

    

	var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">New Password Don't Match Confirm Password</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
return false;

  }

  var fd = new FormData();
            fd.append('old_password',old_password);
			fd.append('new_password',new_password);
            
		  $.ajax({
              url: 'accountSettings/change_password.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){

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
               
              },
           });
		 
 
  
}

function functionAlert(msg, myYes) {
          var confirmBox = $("#confirm");
          confirmBox.find(".message").text(msg);
          confirmBox.find(".yes").unbind().click(function() {
             confirmBox.hide();
          });
          confirmBox.find(".yes").click(myYes);
          confirmBox.show();
       }
</script>

<script>
    
function changeemail() {
    
    var email = document.forms["change_email"]["email"].value;
  
    if(email ==""){
      

	  var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill Email</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
      return false;
    }
    var fd = new FormData();
              fd.append('email',email);
              
              
            $.ajax({
                url: 'accountSettings/change_email.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
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
                   
                   if(response=email){

                    

					var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Email Successfully Changed</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();



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
       

	  
	  var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill Telphone NUmber</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
      return false;
    }
    var fd = new FormData();
              fd.append('tel_phone',tel_phone);
              
              
            $.ajax({
                url: 'accountSettings/change_telphone.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                   

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
                   if(response=tel_phone){

                    

					var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Telphone Successfully Changed</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
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
     

	  
	  var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Please Fill You Location</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
      return false;
    }
    var fd = new FormData();
              fd.append('address_location',address_location);
              
              
            $.ajax({
                url: 'accountSettings/change_address_location.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                  
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
                   if(response=address_location){

                     
					var message= `
      <div id = "confirm">
       <div class = "message" style="text-align: center;">
         <span class="text-danger">CONFIRMED MESSAGE</span><br>
        <span class="text-light" style="font-size:12px;">Address Successfully Changed</span>
        </div>
       <button class = "yes" style="color: white;">OK</button>
      </div>`;

    $('#alert').html(message);

    functionAlert();
                    $('.locationUpdate').html(response);
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

