<?php
session_start();

require_once 'user.php';

$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}
 $fname=$lname=$umail=$upass=$cpass = "";

if(isset($_POST['register_btn'])){

	    $fname = strip_tags($_POST['firstname']);
	    $lname = strip_tags($_POST['lastname']);
	    $umail = strip_tags($_POST['email']);
	    $upass = strip_tags($_POST['password']);
	    $cpass = strip_tags($_POST['confirm_password']);


	    

//$fname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
	    
// 	$fname = test_input($_POST['firstname']);
// 	$lname = test_input($_POST['lastname']);
// 	$umail = test_input($_POST['email']);
// 	$upass = test_input($_POST['password']);
// 	$cpass = test_input($_POST['confirm_password']);

// 	function test_input($data) {

//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = strip_tags($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }

	if($fname=="")	{
		$error[] = "provide firstname !";	
	}
	elseif(!filter_var($fname, FILTER_SANITIZE_STRING))	{
		$error[] = "Please enter valid first name"; 
	}
	else if($lname=="")	{
		$error[] = "provide lastname !";	
	}
	elseif(!filter_var($lname, FILTER_SANITIZE_STRING))	{
		$error[] = "Please enter  valid last name"; 
	}
	
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
		$error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	elseif (!filter_var($upass,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9_\]\[\?\/\<\~\#\`\@\$%\^&\*\(\)\+=\}\|:\";\'\,>\{]{4,20}$/")))){
    $error[]= "Please enter a valid password.";
     }
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else if($upass!= $cpass)	{
		$error[] = "Passwords dosen't match !";
	}
	else
	{	
		try
		{
			$stmt = $user->runQuery("SELECT  user_email FROM users WHERE  user_email=:umail");
			$stmt->execute(array(':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($fname,$lname,$umail,$upass)){	
					$user->redirect('register.php?joined');
					echo 'Thank you for registering .';
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Mangement system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">

		<h2>User Management System</h2>
		<h4>Register</h4>
	</div>
	<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   

		<?php
		if(isset($error))
		{
			foreach($error as $error)
			{
				?>
				<div class="error">
					<?php echo $error; ?>
				</div>
				<?php
			}
		}
		else if(isset($_GET['joined']))
		{
			?>
			<div class="error">
				Successfully registered <a href='login.php'>login</a> here
			</div>
			<?php
		}
		?>


		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="firstname"  required>

		</div>

		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lastname" required>

		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email"  required>

		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="confirm_password" required>

		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>



