<?php
session_start();
require_once("user.php");
$login = new USER();

// if($login->is_loggedin($_SESSION['user_session'])!="")
// 		{
// 			$login->redirect('home.php');
// 		}	

if(isset($_POST['login_btn']))
{

	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);

	if (isset($_POST['g-recaptcha-response'])) {
		require('recaptcha/src/autoload.php');		
		$recaptcha = new \ReCaptcha\ReCaptcha("6Lck1VsUAAAAAN1k5-64sj6BbQK4bnhmqMnvHcml", new \ReCaptcha\RequestMethod\SocketPost());
		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		if (!$resp->isSuccess()) {
			$error = " Unsigned captcha !";	
			$login->redirect('index.php');		
		}
		else{

			$session_check=$login->login($umail,$upass);
			// var_dump($session_check);
			// exit();

			if($session_check == '')
			{
				$error = "Email and password dosen't match !";
				$login->redirect('index.php');

			}
			else{
				$_SESSION['user_session']= $session_check;
				$login->redirect('home.php');}

			}

		}}

		?>