
<!DOCTYPE html>
<html>
<head>
	<title>Login for User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		  <?php
		if(isset($_GET['updated']))
		{
			?>
			<div class="error">
				Successfully Updated <a href='index.php'>login</a> here
			</div>
			<?php
		}
		elseif(isset($_GET['failed'])){
		
			?>
		
			<div class="error">
				Error in update<a href='reset_password.php'>Try Again</a> here
			</div>
			<?php
		}
		elseif(isset($_GET['login'])){
		
			?>
		
			<div class="error">
				Please login to access <a href='index.php'>login</a> 
			</div>
			<?php
		}
		
		?>

		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" placeholder=" E mail ID" required >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Your Password" required>
		</div>

		<div class="g-recaptcha" data-sitekey="6Lck1VsUAAAAAO4T5pV7tvRnPzC1G40jLuQ68Be7" required></div>

		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Forgot Password? <a href="forgot_password.php">Forgot</a>
		</p><br>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>