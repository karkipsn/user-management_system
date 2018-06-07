<?php
session_start();

require_once("user.php");

$forgot = new USER();

if(isset($_POST['forgot_btn']))
{
	$umail = strip_tags($_POST['email']);

	$forgot->email_validation($umail);

	$forgot->redirect('reset_password.php');
}



?>