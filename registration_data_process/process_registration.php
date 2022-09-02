<?php

include('../Glob/database/database_connection.php');

session_start();

 
 

if(isset($_POST["username"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':username'		=>	$username
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			echo 'Username Already Taken !!';
		}
		else
		{
			if(empty($username))
			{
				echo 'Username is required';
			}
			if(empty($password))
			{
				echo 'Password is required';
			}
			 
			 
				$data = array(
					':username'		=>	$username,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);
                $user_profile="images/profile.png";
				$query = "INSERT INTO login (username, password,user_profile,email,location,phone,notification_status) VALUES (:username, :password,'$user_profile','','','','0')";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					echo "Registration Completed !!";
				}else{
				   echo 'Registration Failed !!';

				}
			 
		}
	}
}

?>