<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
 <link rel="stylesheet" href="admin/resource/hom.css" >
   
<script src="admin/resource/home3.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="admin/resource/home1.js"  ></script>
<script src="admin/resource/home2.js"  ></script>

<style>
  .gradient-custom{
    min-height: 100vh;
    max-height: 10000px;
    background-color: red;
    background-image: linear-gradient(to bottom right ,#c850c0,#4158d0);
  }
  .input-container {
  display: -ms-flexbox;  
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  margin-top: 20px;
  min-width: 45px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
  
  border: 2px;
  margin-top: 20px;
   
}

.input-field:focus {
  border: 2px solid dodgerblue;
}
.header_title{

    margin-bottom: 40px;
    margin-top: 25px;
}
 
.btn {
  background-color:green;
  color: white;
  padding: 12px;
  margin-top: 10px;
  cursor: pointer;
  width: 300px;
  opacity: 0.9;
  
  border:2px ;border-radius: 25px;

}

.btn:hover {
  opacity: 0.5;
  color: black;
}
.txt2:hover{
    opacity: o.5;
    color: yellow;
}

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


<section class="gradient-custom">
  <div class="container ">
    
    <div class="row d-flex justify-content-center">

     <div class="col-md-12 m-2 mt-12 col-lg-8 col-xl-8" >
      
        
        <div class="card    " style="border:2px ;border-radius: 10px; margin-top:50px ;background-color:black">
        
   
 
          <div class="card-body p-4 " >
            
             
             <div class="row ">
             <div id="alert">
    </div>

              
              <div class="col" id="display_user_chats"  style="height: 590px; overflow: auto;	overflow-x: hidden; overflow-y: hidden;">
 
                <div class="container">

                <div class=" d-flex justify-content-center">
                <span style="color:yellow" class="header_title">
						<h3>Member Registration</h3>
					</span>
    
              </div>
			    
                    
                    <div class=" d-flex justify-content-center">
                    <form  style="max-width:500px;margin:auto" name="form_data">

  
                               <div class="input-container">
                                    <i class="fa fa-user icon"></i>
                                     <input class="input-field" type="text" placeholder="Username" name="username">
                                </div>

                                  
  
                                <div class="input-container">
                                   <i class="fa fa-key icon"></i>
                                   <input class="input-field" type="password" placeholder="Password" name="password">
                                 </div>
								 <div class="input-container">
                                   <i class="fa fa-key icon"></i>
                                   <input class="input-field" type="password" placeholder="Confirm Password" name="confirm_password">
                                 </div>

                                  <button type="button"  onclick="return authenticate_user()"  class="btn">REGISTER</button>
                                  <div class=" text-center"style="margin-top: 10px;">
						 
						         <a class="txt2" href="#" >
						                	 WELCOME TO GLOBULA
						                      </a>
					                    </div>

                                           <div class="text-center" style="margin-top: 120px;">
                                         

					                	<a class="txt2" href="index.php">
										<span class="text-light">Do You Have Account?</span>	 LOGIN
						                	<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						                </a>
				                      	</div>
                                </form>

                              


              </div>
 
  
               </div>
              

            </div>

             
          </div>
        </div>
        


 


      </div>
    </div>
  </div>
  
</section>
 
<script  >



  		
function functionAlert(msg, myYes) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes").unbind().click(function() {
       confirmBox.hide();
    });
    confirmBox.find(".yes").click(myYes);
    confirmBox.show();
 }


function authenticate_user(){

    var username =document.forms["form_data"]["username"].value;
    var user_password =document.forms["form_data"]["password"].value;
	var confirm_password=document.forms["form_data"]["confirm_password"].value; 


    if(username ==""){

    var message= `
  <div id = "confirm">
   <div class = "message" style="text-align: center;">
     <span class="text-danger">CONFIRMED MESSAGE</span><br>
    <span class="text-light" style="font-size:12px;">Please Enter Username!!</span>
    </div>
   <button class = "yes" style="color: white;">OK</button>
  </div>`;

  $('#alert').html(message);

functionAlert();

return false;

    }

    if(user_password ==""){
        var message= `
  <div id = "confirm">
   <div class = "message" style="text-align: center;">
     <span class="text-danger">CONFIRMED MESSAGE</span><br>
    <span class="text-light" style="font-size:12px;">Please Enter Password!!</span>
    </div>
   <button class = "yes" style="color: white;">OK</button>
  </div>`;

  $('#alert').html(message);

functionAlert();

return false;
        }

		if( confirm_password ==""){
        var message= `
  <div id = "confirm">
   <div class = "message" style="text-align: center;">
     <span class="text-danger">CONFIRMED MESSAGE</span><br>
    <span class="text-light" style="font-size:12px;">Please Enter Confirm Password!!</span>
    </div>
   <button class = "yes" style="color: white;">OK</button>
  </div>`;

  $('#alert').html(message);

functionAlert();

return false;
        }



		if(user_password !== confirm_password){
        var message= `
  <div id = "confirm">
   <div class = "message" style="text-align: center;">
     <span class="text-danger">CONFIRMED MESSAGE</span><br>
    <span class="text-light" style="font-size:12px;">Passwords Don't Match</span>
    </div>
   <button class = "yes" style="color: white;">OK</button>
  </div>`;

  $('#alert').html(message);

functionAlert();

return false;
        }






        var fd = new FormData();
          fd.append('username',username);
          fd.append('password',user_password);


          $.ajax({
            url: 'registration_data_process/process_registration.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){

                  if(response == "Registration Completed !!"){
					var message= `
                                  <div id = "confirm">
                                      <div class = "message" style="text-align: center;">
                              <span class="text-danger">CONFIRMED MESSAGE</span><br>
                            <span class="text-light" style="font-size:12px;">Successfully Registered `+username+` </span><br>
                            <span class="text-light" style="font-size:12px;"> Please Login!! </span>


                                </div>
                               <button class = "yes" style="color: white;">OK</button>
                              </div>`;

                          $('#alert').html(message);

                          functionAlert();
                       setTimeout(redirecting, 3000);
                          function redirecting() {

                            location.replace("index.php")
                           
                                }


 
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
								return false;

                       }

             
                
               
              
            },
         });

     


     

     
}
</script>


    
</body>
</html>