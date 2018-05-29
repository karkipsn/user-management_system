<?php
session_start();

require_once("user.php");

$login = new USER();


if(isset($_POST['login_btn']))
{
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);


// for recaptcha checking

	if (isset($_POST['g-recaptcha-response'])) {

		require('recaptcha/src/autoload.php');		

		$recaptcha = new \ReCaptcha\ReCaptcha("6Lck1VsUAAAAAN1k5-64sj6BbQK4bnhmqMnvHcml", new \ReCaptcha\RequestMethod\SocketPost());

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		if (!$resp->isSuccess()) {

			$error = " Unsigned captcha !";			
		}}
		
		$session_check[]=$login->login($umail,$upass);

		if($session_check==0)
		{
			$error = "Email and password dosen't match !";
			
		}
		else
		{
			$_SESSION['user_session']= $session_check;

			$login->redirect('home.php');;
		}
		if($login->is_loggedin($_SESSION['user_session'])!="")
		{
			$login->redirect('home.php');
		}	

	}
	
	?>

