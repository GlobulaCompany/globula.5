<!DOCTYPE html>
<html>

<head>
<style>
     
	 body {font-family: Arial, Helvetica, sans-serif;}
	 * {box-sizing: border-box;}
	  
	 .share-button {
	   background-color: green;
	   color: white;
	   padding: 4px 4px;
	   border: none;
	   cursor: pointer;
	   opacity: 0.8;
	   position: absolute;
	   width: 100px;
	   border:2px ;border-radius: 25px;
	 }
	 
	  
	 .share-popup {
	   display: none;
	   position: absolute;
	   border: 1px solid #f1f1f1;
	   z-index: 9;
	 }
	 
	  
	 .share-container {
	   max-width: 400px;
	   padding: 10px;
	   background-color: white;
	   max-height: 200px;
	 }
	 

	 .share-container .btn {
	   background-color: #04AA6D;
	   color: white;
	   padding: 5px 4px;
	   border: none;
	   cursor: pointer;
	   width: 100%;
	   margin-bottom:5px;
	   opacity: 0.8;
	   border:2px ;
	   border-radius: 25px;
	 }
	 
	  
	 .share-container .cancel {
	   background-color: red;
	 }
	 
	  
	 .share-container .btn:hover, .share-button:hover {
	   border:2px ;border-radius: 25px;
	   opacity: 1;
	 }
	 </style>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="share-popup " id="share_place">
   <form   class="share-container bg-dark">
<a rel="nofollow noopener noreferrer" href="http://www.twitter.com/share?url=https://www.floxblog.com/" target="_blank" title="Click to share on Twitter"><i class="fa fa-twitter" style="font-size:50px ;"></i></a>
<a rel="nofollow noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank" title="Click to share on Facebook"><i class="fa fa-facebook" style="font-size:50px ;"></i></a>
<a rel="nofollow noopener noreferrer" href="https://telegram.me/share/url?url=https://www.floxblog.com/&text=This is text" target="_blank" title="Click to share on Telegram"><i class="fa fa-telegram" style="font-size:50px ;"></i></a>
<a rel="nofollow noopener noreferrer" href="https://wa.me/?text=This is text" target="_blank" title="Click to share on WhatsApp"><i class="fa fa-whatsapp" style="font-size:50px ;"></i></a>

<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
      
   </div>
   
<button class="share-button" onclick="openForm()"><span class="text-light">Share</span></button>






<script>
   function openForm() {
  document.getElementById("share_place").style.display = "block";
}

function closeForm() {
  document.getElementById("share_place").style.display = "none";
}
</script>






</body>

</html>
