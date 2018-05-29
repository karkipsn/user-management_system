<?php

	session_start();
	
	require_once 'user.php';

	$session = new USER();
	
	if(!$session->is_loggedin($_SESSION['user_session']))
	{
		// session no set redirects to login page
		$session->redirect('login.php');
	}
	?>