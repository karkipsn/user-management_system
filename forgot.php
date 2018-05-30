<?php
session_start();

require_once("user.php");

$forgot = new USER();

if(isset($_POST['forgot_btn']))
{
	$umail = strip_tags($_POST['email']);

	if($forgot->email_validation($umail)){

	$forgot->redirect('reset_password.php');
}
else{
	echo 'No users registered with such name';
}

}

?>