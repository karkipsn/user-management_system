
<!DOCTYPE html>
<html>
<head>
	<title>Login for User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<div class="header">
		<h2>Forgot Password</h2>
	</div>
	<form method="post" action="reset_p.php">

		

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email"  required>

		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		

		<div class="input-group">
			<button type="submit" class="btn" name="reset_btn">Reset</button>
		</div>
		
	</form>
</body>
</html>