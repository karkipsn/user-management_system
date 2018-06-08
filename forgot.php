<?php
session_start();

require_once("user.php");
require_once("redirect.php");


$forgot = new USER();
$r= new Redirect();

if(isset($_POST['forgot_btn']))
{
	$umail = strip_tags($_POST['email']);

	$forgot->email_validation($umail);

	$r->redirect('reset_password.php');
}



?>