<?php
 

//  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

 
 
// date_default_timezone_set('Africa/Nairobi');

// $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8mb4", "$username", "$password");




date_default_timezone_set('Africa/Nairobi'); 

$connect = new PDO("mysql:host=localhost;dbname=globula;charset=utf8mb4", "root", "");



 

 

 
 
 


?>