

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
	<form method="post"  action="register_fn.php">   

		<?php
		
		if(isset($error))
		{			
				?>
				<div class="error">
					<?php echo $error; ?>
				</div>
				<?php
			
		}
		else if(isset($_GET['joined']))
		{
			?>
			<div class="error">
				Successfully registered <a href='index.php'>login</a> here
			</div>
			<?php
		}
		else if(isset($_GET['invalid']))
		{
		?>
		<div class="error">
				Email already in use. Click <a href='register.php'>Refresh</a> and try with another mail address
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
			Already a member? <a href="index.php">Sign in</a>
		</p>
	</form>
</body>
</html>




