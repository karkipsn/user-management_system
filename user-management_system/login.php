<?php
session_start();
require_once("user.php");

$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('index.php');
}

if(isset($_POST['login_btn']))
{
	$uname = strip_tags($_POST['username']);
	$umail = strip_tags($_POST['username']);
	$upass = strip_tags($_POST['password']);
		
	if($login->login($uname,$umail,$upass))
	{
		$login->redirect('index.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login for User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username or E mail ID" required >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Your Password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>