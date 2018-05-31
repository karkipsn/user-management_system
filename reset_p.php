<?php
session_start();

require_once("user.php");

$reset = new USER();

if(isset($_POST['reset_btn']))
{
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);

	
		if($reset->update_password($umail,$upass)==true){
		
			$reset->redirect('index.php?updated');
		}
		else{
			$reset->redirect('index.php?failed');
		}
	}


?>
 