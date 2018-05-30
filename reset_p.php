<?php
session_start();

require_once("user.php");

$reset = new USER();

if(isset($_POST['reset_btn']))
{
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$cupass = strip_tags($_POST['confirm_password']);

	// if($umail==$cupass){
		if($reset->update_password($umail,$upass)==true){
			$msg = 'Password reset successful';
			$reset->redirect('index.php');
		}
		else{
			$msg = 'Password reset failed';
		}
	}

	// else{
	// 	echo 'Passwords dosent match';
	// }



?>

<?php
		if(isset($msg))
		{
			?>
			<div class="error">
				<?php echo $msg; ?> 
			</div>
			<?php
		}
		?>