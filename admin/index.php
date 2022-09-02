<?php
session_start();
require_once("../Glob/database/database.php");

$query =mysqli_query($conn,"SELECT * FROM login");
if(!isset($_SESSION['admin_id'])){
  header("location: adminlogin.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
<title>GLOBULA ADMIN</title>
<meta charset="UTF-8">
<link rel="icon" href="../Glob/images/logo.png">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="resource/hom.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  font-size: 15px;
  cursor: pointer;
  user-select: none;
   
}

.fa:hover {
  color: darkblue;
}
</style>
<style>

 
</style>
 

<link rel="stylesheet" href="resource/tablecss.css" />
 
	<script type="text/javascript" src="resource/table.js"></script>

 
	<script type="text/javascript" src="resource/tab.js"></script>
</head>
<body >

<?php
include("navigation_settings/navbar.php");
echo $nav;


?>
<div class="container mt-5 flex justify-content-center  ">
<div class="text-success m-4" > 
  <h6 style="text-align: center;"><u>GlOBULA USERS</u></h6>
</div>
 
<table id="tableID" class="display"  >
    <thead>
        <tr class="text-primary">
           
            <th>User Name</th>
            <th>Emails</th>
            <th>View User Deatils</th>
            
        </tr>
    </thead>
    <tbody>
<?php while($result=mysqli_fetch_assoc($query)){?>
        <tr>
           
            <td class="text-danger"><?php echo $result['username']; ?></td>
            <td><?php  if($result['email']){
              echo $result['email'];

            }else{
              echo "No email";
            } ?></td>

          
         <td> <button class="btn btn-success "><a class="text-light" href="user_account_details.php?user_id=<?php echo $result['user_id']; ?>">View details</a></button>
              </td>
        </tr>
<?php } ?>
      </tbody>
</table> 
 
</div>




 
 
<script>
      $(document).ready(function() {
			$('#tableID').DataTable({ });
		});
	</script>
  <script src="resource/home1.js"  ></script>
<script src="resource/home2.js"  ></script>

 
</body>
</html> 
