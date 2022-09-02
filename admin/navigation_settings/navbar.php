<?php
 

$nav='<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand"  style="color:#FFD700 ;" href="#">GLOBULA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
 
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link  " style="color:#FFD700 ;" href="index.php">Admin-Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  style="color:#FFD700 ;"href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin-Account Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <div class="dropdown-divider" style="background-color:#FFD700 ;"></div>
           
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"   href="send_notification.php">Send Notification </a></button>

          <div class="dropdown-divider"></div>
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"   href="#">Arrage Meetings</a></button>

          <div class="dropdown-divider"></div>
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"   href="#">Account Settings</a></button>
           
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  style="color:#FFD700 ;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users Entertainment
        </a>
        <div class="dropdown-menu"  style="color:#FFD700 ;" aria-labelledby="navbarDropdown">
        <div class="dropdown-divider"></div>

          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"     href="#">Music</a></button>
          <div class="dropdown-divider"></div>
          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"     href="#">Movies</a></button>
          <div class="dropdown-divider"></div>

          <button class="btn btn-outline-success my-2 my-sm-0 p-2 m-2"><a class="dropdown-item"     href="#">Fun $ Jokes</a></button>

 

        </div>
       
       
    </ul>
   
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <button class="btn btn-outline-danger my-2 my-sm-0 p-2 m-2" type="submit"><a href="admin_data_process/logout.php">LOGOUT </a></button>

    </form>
  </div>
</nav>';






?>