<?php
 
 session_start();
include('../database/database_connection.php');
date_default_timezone_set('Africa/Nairobi');
 

$query = "UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION["login_details_id"]."'";

$statement = $connect->prepare($query);

$statement->execute();

?>