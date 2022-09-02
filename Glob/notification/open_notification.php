<?php
session_start();
$user_id=$_SESSION['user_id'];

require("../database/database.php");
$query =mysqli_query($conn,"UPDATE login SET notification_status=0 WHERE user_id='{$user_id}'");


?>