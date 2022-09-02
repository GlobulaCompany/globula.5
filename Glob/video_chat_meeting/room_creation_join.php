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
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Meeting Creation & Join</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/room_creation_join.css'>
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

    <header id="nav" style="background-color:green; border:1px ;border-radius:10px; ">
       <div class="nav--list" >
            <a href="../index.php">
                
                <span id="logo2">Home<i class="fa fa-home" style="font-size:20px;color:yellow;"></i></span>
            </a>
       </div>

    
        </div>
    </header>

    <main id="room__room_creation_join__container " class="text-light ">
        
        <div id="form__container"  style="  border:1px ;border-radius:10px;" class="bg-dark">
             <div id="form__container__header" >
                 <p class="p-2" >Create & Join Meeting</p>
             </div>
 
 
            <form id="room_creation_join__form">
            
                 <div class="form__field__wrapper">
                     <label>Your Username</label>
                     <input type="text" name="name" value="<?php  echo $_SESSION['username']; ?>"  style="color:yellow;" />
                 </div>
 
                 <div class="form__field__wrapper">
                     <label>Enter Meeting Name </label>
                     <input type="text" name="room"  placeholder="Enter Meeting name & number ..." />
					<ul style="list-style-type:circle;"  class="mt-3">
                    <li class="text-info m-1"><span class="fs-6">Invitee Enter Meeting Name</span></li>
                    <li class="text-info m-1"><span class="fs-6">Host Create Meeting Name</span></li>
                
                
                </ul>

                 </div>
 
                 <div class="form__field__wrapper">
                    <button type="submit" class="btn btn-success">Start Meeting 
                    </button>
                 </div>
            </form>
        </div>
     </main>
    
</body>
<script type="text/javascript" src="js/room_creation_join.js"></script>
</html>