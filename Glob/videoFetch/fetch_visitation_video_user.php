<?php 
require_once("../database/database.php");
require_once("get_total_likes_last.php");
require_once("get_total_views.php");

require_once("get_total_subscribers_last.php");
$video_code =$_POST['video_code']; 

 
$query = mysqli_query($conn,"SELECT * FROM video  WHERE video_code= '{$video_code}'");
 

if(mysqli_num_rows($query)>0){
    $output='';
    while($result =mysqli_fetch_assoc($query)){

        $output.='
         
        <div class="card text-white bg-dark border border-info mt-2 mb-2 "    >
             
              <div class="card-body" >';
              

     $output .='   <video src="'.$result['video_name'].' " id="myVideo_'.$result['video_id'].'"   width="100%" height="250px"></video>  ';
 
         $output .='
         <div class="container bg-success   d-flex justify-content-center">
         <button data-video_id="'.$result['video_id'].'" class="pause mr-2 m-1"  type="button"><i class="fa fa-stop-circle-o" style="color:red"></i></button>

         <button data-video_id="'.$result['video_id'].'" data-view_to_id="'.$result['user_id'].'" class="play mr-2 m-1 "  type="button"><i class="fa fa-play" style=" color:red"></i></button>
         <button data-video_id="'.$result['video_id'].'" class="pause m-1"  type="button"><i class="fa fa-pause" style="color:red"></i></button>

                    
            </div>
            </div>
            
          
        
        
       </div>


       <div class="card-header lead border border-info  bg-dark border border-info"  >  
            
       <div class="row mt-2 bg-dark ">
    

      
         
       <div class="col-7  " >';
       $username=  (strlen($result['username']) > 15) ? substr($result['username'],0,15).'...' : $result['username'];

$output .='<span class="text-light" >Owner: <span class="text-success" style="font-size:12px;">'.$username.'</span></span>
       </br>
        ';
        
       $title=  (strlen($result['title']) > 10) ? substr($result['title'],0,10).'...' : $result['title'];
$output .=' <span  class="text-light"  >Title: <span class="text-success" style="font-size:12px;" >'.$title.'</span></span>
      
      </br>
      <span class="text-light" ">Description:';

      $description=  (strlen($result['description']) > 10) ? substr($result['description'],0,9).'...' : $result['description'];

$output.=' <span class="text-success" style="font-size:12px;" >'.$description.'</span></span> 
<br>
<button style="font-size:12px;border:2px ;border-radius: 25px;" class="btn btn-success"><a href="video_comments.php?video_id='.$result['video_id'].'&video_owener='.$result['username'].'" class="text-light" >Comments</a></button> 
<br>
<br>
<button  style="font-size:12px; " data-subscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-primary  subscribe_channel    ">Subscribe</button> 

       

     </div>
       <div class="col-5">
       <span  class="text-light" >Likes </span><button  data-video_id="'.$result['video_id'].'" data-like_to_id="'.$result['user_id'].'" type="submit"   class="fa fa-thumbs-up like_video"></button>  <span class="text-warning" id="likes_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_likes_of_video($result['video_id'],$conn).'</span>
       </br>
       <span class="text-light" >Views: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger" id="views_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_views_of_video($result['video_id'],$conn).'</span></span>
       <br>
       <span  class="text-light" >Followers: <span class="text-primary" id="subscribers_count_'.$result['video_id'].'" style="font-size:12px;" >'.get_total_subscribers_of_channel($result['user_id'],$conn).'</span>
       <br>
       

       <div class="share-popup " id="share_place'.$result['video_id'].'">
          <form   class="share-container bg-dark">
       <a rel="nofollow noopener noreferrer" href="https://www.twitter.com/share?url=https://globula.herokuapp.com/Glob/visitation_link_for_users_videos.php?v='.$result['video_code'].'" target="_blank" title="Click to share on Twitter"><i class="fa fa-twitter" style="font-size:30px ;"></i></a>
       <a rel="nofollow noopener noreferrer" href="https://telegram.me/share/url?url=https://globula.herokuapp.com/Glob/visitation_link_for_users_videos.php?v='.$result['video_code'].'" target="_blank" title="Click to share on Telegram"><i class="fa fa-telegram" style="font-size:30px ;"></i></a>
       <a rel="nofollow noopener noreferrer" href="https://wa.me/?text=https://globula.herokuapp.com/Glob/visitation_link_for_users_videos.php?v='.$result['video_code'].'" target="_blank" title="Click to share on WhatsApp"><i class="fa fa-whatsapp" style="font-size:30px ;"></i></a>
       
       <button type="button" data-video_id="'.$result['video_id'].'" class="btn cancel"  >Close</button>
             </form>
             
          </div>
       
       
          
       <button   data-video_id="'.$result['video_id'].'" class="share-button btn-success" ><span class="text-light">Share</span></button>
        
       
        <br>
        <br>

        <button style="font-size:12px;" data-unsubscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-warning unsubscribe_channel  ">Unsubscribe</button> 
       
       </div>
        
       </div>
       
       
       
        
        
       
       </div>
       
       
      
       
   
     
   
   ';

   



    }
     

    echo $output;

}
?>
 
       
       


