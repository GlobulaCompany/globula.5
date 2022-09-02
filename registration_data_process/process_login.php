<?php

include('../Glob/database/database_connection.php');

session_start();
 

if(isset($_POST['password']))
{
      
	$query = "
		SELECT * FROM login 
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(password_verify($_POST["password"], $row["password"]))
			{
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['user_profile'] = $row['user_profile'];
				date_default_timezone_set('Africa/Nairobi');
		$sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')";

				$statement = $connect->prepare($sub_query);
				$statement->execute();

				$_SESSION['login_details_id'] = $connect->lastInsertId();


                echo "Successfully Logged In !!";
					 
			}
			else
			{
				echo 'Wrong Credentials';
			}
		}
	}
	else
	{
		echo 'Wrong Credentials';
	}
}


?>