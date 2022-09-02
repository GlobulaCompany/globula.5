<?php
 
require_once("notification/fetch_notification_total.php");

$nav='<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand"  style="color:#FFD700 ;" href="#">GLOBULA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
 
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link  " style="color:#FFD700 ;" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  style="color:#FFD700 ;"href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account Details
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <div class="dropdown-divider" style="background-color:#FFD700 ;"></div>
           
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"   href="upload_video.php">Upload Video </a></button>

          <div class="dropdown-divider"></div>
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"   href="your_videos_upload.php">Your Videos List</a></button>

          <div class="dropdown-divider"></div>
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"   href="account_details.php">Account Settings</a></button>
           
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link "  style="color:#FFD700 ;" href="chat_room.php">Chat Friends</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  style="color:#FFD700 ;" href="video_chat_meeting/room_creation_join.php">video meetings</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link "  style="color:#FFD700 ;" href="globula_about.php">About</a>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-primary position-relative open_notification"><a href="notification_display.php" class="text-light">
        Notification</a>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
         '.notification_Update($_SESSION['user_id'],$conn).'
        </span>
        </button>
      </li>
    </ul>
   
    <form class="form-inline  ">
    
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
     <a class="nav-link  " style="color:#FFD700 ;cursor: pointer;"     onclick="return logout_user_message()"  >
    
      <span class="sr-only">(current)</span> logout  <i class="fa fa-sign-out" style="font-size:20px;color:pink"></i> </a>
       
    </li>
    </ul>
 
     
       
      

    </form>
  </div>
</nav>







';






?>