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

    var admin_username =document.forms["form_data"]["admin_username"].value;
    var admin_password =document.forms["form_data"]["admin_password"].value;


    if(admin_username ==""){

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

    if(admin_password ==""){
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
          fd.append('admin_password',admin_password);
          fd.append('admin_username', admin_username);


          $.ajax({
            url: 'admin_data_process/admin_login_process.php',
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
                       <span class="text-light" style="font-size:12px;"> Admin `+response+`</span>
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
                       <span class="text-light" style="font-size:12px;">Successfully Logged In <br> Welcome Admin</span>
                           </div>
                          <button class = "yes" style="color: white;">OK</button>
                         </div>`;

                     $('#alert').html(message);

                     functionAlert();
                  setTimeout(redirecting, 2000);
                     function redirecting() {

                       location.replace("index.php")
                      
                           }

                   


                  }


                  
             
                
               
              
            },
         });

     


     

     
}