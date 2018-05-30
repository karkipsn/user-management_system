<?php
session_start();

require_once 'user.php';

$user = new USER();



if(isset($_POST['register_btn'])){

	$fname = strip_tags($_POST['firstname']);
	$lname = strip_tags($_POST['lastname']);
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$cpass = strip_tags($_POST['confirm_password']);


//$fname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);

	if($fname=="")	{
		$error = "provide firstname !";	
	}
	elseif(!filter_var($fname, FILTER_SANITIZE_STRING))	{
		$error = "Please enter valid first name"; 
	}
	else if($lname=="")	{
		$error = "provide lastname !";	
	}
	elseif(!filter_var($lname, FILTER_SANITIZE_STRING))	{
		$error = "Please enter  valid last name"; 
	}
	
	else if($umail=="")	{
		$error = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
		$error = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error = "provide password !";
	}
	elseif (!filter_var($upass,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9_\]\[\?\/\<\~\#\`\@\$%\^&\*\(\)\+=\}\|:\";\'\,>\{]{4,20}$/")))){
		$error= "Please enter a valid password.";
	}
	else if(strlen($upass) < 6){
		$error = "Password must be atleast 6 characters";	
	}
	else if($upass!= $cpass)	{
		$error = "Passwords dosen't match !";
	}
    else{
	$userv=$user->email_validation($umail);
	if($userv==true)
	{	
		$user->redirect('register.php?invalid');
		

	}else{
		$user->register($fname,$lname,$umail,$upass);
		$user->redirect('register.php?joined');

	} }}
	?> 