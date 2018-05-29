<?php
	require_once('session.php');
	require_once('user.php');
	
	$user_logout = new USER();
	// $_SESSION['user_session']=$sess;
	
	if($user_logout->is_loggedin($_SESSION['user_session'])!="")
	{  
		$user_logout->redirect('home.php');
		
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->logout($sess);
		$user_logout->redirect('index.php');
	}
	?>
