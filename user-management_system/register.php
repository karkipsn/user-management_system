<?php
session_start();

require_once 'database.php';
require_once 'user.php';

$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('index.php');
}

if(isset($_POST['register_btn'])){

    $fname = strip_tags($_POST['firstname']);
    $lname = strip_tags($_POST['lastname']);
    $uname = strip_tags($_POST['username']);
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);

	if($fname=="")	{
		$error[] = "provide firstname !";	
	}else if($lname=="")	{
		$error[] = "provide lastname !";	
	}else if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{	
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($fname,$lname,$uname,$umail,$upass)){	
					$user->redirect('register.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Mangement system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">

		<h2>User Management System</h2>
		<h4>Register</h4>
	</div>
	<form method="post" action="register.php"   >

		<php echo display_error(); ?>

			<div class="input-group">
				<label>First Name</label>
				<input type="text" name="firstname"  required>
				
			</div>

			<div class="input-group">
				<label>Second Name</label>
				<input type="text" name="lastname" required>
				
			</div>

			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username"  required>
				
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email"  required>
			
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="confirm_password" required>
				
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="register_btn">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</body>
	</html>

	
   
