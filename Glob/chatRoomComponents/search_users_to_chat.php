<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Chat Room </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../resource/hom.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
<script src="../resource/home3.js"></script>

<script src="../resource/home1.js"  ></script>
<script src="../resource/home2.js"  ></script>
<style>

body{
background-color:#33475b;
overflow-x: hidden;
}
</style>

</head>
 


<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-warning" href="../chat_room.php" >Return <i class="fa fa-long-arrow-right" style="font-size:20px;color:white;"></i></a></a>
  

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active text-warning" href="../chat_room.php" >Return Home  <i class="fa fa-home" style="font-size:20px;color:white;"></i> </a>
      
    
    </div>
  </div>
</nav>

  <div class="container">
	<div class="row">
		<div class="col">
 
     <div class="d-flex justify-content-between bg-dark align-items-center m-3" style="border:2px ;border-radius: 10px;">
              
	 <span class=" ml-2 text-light p-2"><i>Globula users</i></span>
         <div class="d-flex justify-content-end align-items-center m-2">
             
			   <i class=" fa fa-search text-light" style=" padding: 11px; background: dodgerblue;color: white;min-width: 45px;text-align: center;"></i>
                                    <div class="searche  ">
                                        <input type="text" name="footer-email" placeholder="Search  Friends" class="form-control">
                                        
                                           
                                    </div>
                                

       
        </div>
     </div>



	   <div class="bg-dark" style="border:2px ;border-radius: 15px;">

	  <table class="table">
	  
	  <tbody>
		   
	     <div id="result"></div>
		
	  </tbody>
	</table>

	</div>

	</div>
	</div>
 </div>
 

 
 
<script>

$(document).ready(function(){
 fetch_user();
 

 function fetch_user()
{ $.ajax({
type: 'POST',
url: 'chats_components/onload_fetch_all_globula_users.php',
 

success: function(response) {


  $('#result').html(response);
}
});
}

});

$(document).ready(function(){
    $('.searche input[type="text"]').on("keyup input", function(){
        
        var username="<?php echo $_SESSION['username']; ?>";
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");


         
            $.get("chats_components/fetch_all_globula_users.php", {searchvalue: inputVal,username:username}).done(
                
                function(data){
               
                
				$('#result').html(data);

            }
            
            );
            
       
    });
    
    
     

});
</script>
	
</body>
</html>
