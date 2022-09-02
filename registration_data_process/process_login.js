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
     var video_link ="<?php echo GET['v']; ?>";
     alert(video_link);

    var username =document.forms["form_data"]["username"].value;
    var user_password =document.forms["form_data"]["password"].value;


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

        var fd = new FormData();
          fd.append('username',username);
          fd.append('password',user_password);


          $.ajax({
            url: 'registration_data_process/process_login.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){

                  if(response == "Wrong Credentials"){
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

                       }else{

                        var message= `
                                  <div id = "confirm">
                                      <div class = "message" style="text-align: center;">
                              <span class="text-danger">CONFIRMED MESSAGE</span><br>
                            <span class="text-light" style="font-size:12px;">Successfully Logged In `+username+`</span>
                                </div>
                               <button class = "yes" style="color: white;">OK</button>
                              </div>`;

                          $('#alert').html(message);

                          functionAlert();
                       setTimeout(redirecting, 2000);
                          function redirecting() {

                            location.replace("Glob/index.php")
                           
                                }

                        


                       }

             
                
               
              
            },
         });

     


     

     
}