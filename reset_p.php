<?php
session_start();

require_once("user.php");

$reset = new USER();

if(isset($_POST['reset_btn']))
{
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$name = $_SESSION['user_session'];


	$rest=$reset->update_password($umail,$upass);

		if(!$rest)
		{
              $reset->redirect('index.php?failed');
			
		}
		else{
            $ret = $rest;
            $hmail = $ret[0];
            $hpass = $ret[1];

			$reset->log($hmail,$upass,$hpass,$name);
			$reset->redirect('index.php?updated');
			
		}


	}


?>
 