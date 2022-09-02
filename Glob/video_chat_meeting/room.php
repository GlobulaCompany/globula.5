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
    <title>Globula Meetings</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='styles/room.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    
   
</head>
<body>
    

    <header id="nav"  style="background-color:green; border:1px ;border-radius:10px;" >
       <div class="nav--list">
            <button id="members__button">
               <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>
               <a href="../index.php">
                <h3 id="logo">
    
                    <span id="logo2">Home<i class="fa fa-home" style="font-size:20px;color:yellow;"></i></span> 
                </h3>
               
            </a>
            </button>
            <a href="../index.php">
                <h3 id="logo">
    
                    <span id="logo2">Home<i class="fa fa-home" style="font-size:20px;color:yellow;"></i></span> 
                </h3>
               
            </a>
       </div>

        <div id="nav__links">
            <button id="chat__button"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg></button>
            
            
        </div>
    </header>
    

    <main class="container">
        <div id="room__container">

            <section id="members__container">

            <div id="members__header">
            <a href="../index.php"  style="color: white;">

                 
    
<i class="fa fa-home" style="font-size:20px;color:yellow;"></i><sup>Return</sup> 

</a> <br>
                <p>    
                    Members </p>
                <strong id="members__count">0</strong>

              
            </div>

            <div id="member__list">
            </div>

            </section>

            <section id="stream__container">

                <div id="stream__box"></div>

                <div id="streams__container"></div>

                <div class="stream__actions">

                    <button id="screen-btn" style="background-color :yellow;">
                        <i class="fa fa-desktop" style="color:black; font-size:28px;"></i>
                        
                      </button>
                     
                      
                    <button id="camera-btn" class="active">
                        <i class="fa fa-camera" style="color:rgb(208, 201, 201); font-size:28px;"></i>

                    </button>
                    <button id="mic-btn" class="active">
                        <i class="fa fa-microphone" style="color:rgb(208, 201, 201); font-size:28px;"></i>
                      
                    </button>
                   
                    <button id="leave-btn" style="background-color :rgb(209, 24, 24);">
                        <i class="fa fa-power-off" style="color:rgb(208, 201, 201); font-size:28px;"></i>
                    </button>
                </div>

                <button id="join-btn">Join Meeting</button>
            </section>

            <section id="messages__container">

                <div id="messages"></div>

                <form id="message__form">
                    <input type="text" name="message" placeholder="Send a message...." />
                </form>

            </section>
        </div>
    </main>
    
</body>
<script type="text/javascript" src="js/AgoraRTC_N-4.11.0.js"></script>
<script type="text/javascript" src="js/agora-rtm-sdk-1.4.4.js"></script>
<script type="text/javascript" src="js/room.js"></script>
<script type="text/javascript" src="js/room_rtm.js"></script>
<script type="text/javascript" src="js/room_rtc.js"></script>
</html>