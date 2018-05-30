
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
	<form method="post" action="forgot.php">

		

		<div class="input-group">
			<label> Enter email address</label>
			<input type="text" name="email" placeholder=" E mail ID" required >
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="forgot_btn">Confirm</button>
		</div>
		
	</form>
</body>
</html>