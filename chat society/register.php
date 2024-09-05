<!--
//register.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:index.php');
}

if(isset($_POST["register"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$email = trim($_POST["email"]);
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
			$message .= '<p><label>Username already taken</label></p>';
		}
		else
		{
			if(empty($username))
			{
				$message .= '<p><label>Username is required</label></p>';
			}
			if(empty($password))
			{
				$message .= '<p><label>Password is required</label></p>';
			}
			else
			{
				if(empty($email))
			{
				$message .= '<p><label>Email Address is required</label></p>';
			}
		}
			if($message == '')
			{
				$data = array(
					':username'		=>	$username,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login 
				(username, password) 
				VALUES (:username, :password)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "<label>Registration Completed</label>";
				}
			}
		}
	}
}

?>

<html>  
    <head>  
        <title>Chat Society</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Chat Society</a></h3><br />
			<br />
			<div class="group">
				<div class="panel-body">
					<form method="post">
						<span class="text-danger"><?php echo $message; ?></span>
						<div align="center" class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username"  />
						</div>
						<div align="center" class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password"  />
						</div>
						<div align="center" class="form-group">
							<label>Enter your Email Address</label>
							<input type="email" name="email"  />
						</div>
						<div align="center" class="form-group">
							<input type="submit" name="register" class="btn btn-info" value="Signup" />
						</div>
						<div align="center">
							<a href="login.php">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;
}
.container{
  background: #fff;
  max-width: 450px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

/* Login & Signup Form CSS Start */
.form{
  padding: 25px 30px;
}
.group{
  font-size: 12px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #e6e6e6;
}
</style>
