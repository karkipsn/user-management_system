<?php

	session_start();
	
	require_once 'user.php';

	$session = new USER();
	
	
	// put this file within secured pages that users (users can't access without login)
	
	if(!$session->is_loggedin())
	{
		// session no set redirects to login page
		$session->redirect('login.php');
	}
	?>