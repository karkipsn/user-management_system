
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Page</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>
	<!-- <div class="header">
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
		 -->



		<div class="container">
			<legend><center><h2><b>Confirm Email </b></h2></center></legend><br>

			<form class="form-horizontal" method="post" action="forgot.php">


				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Enter email address:</label>
					<div class="col-sm-6">          
						<input type="text" class="form-control" id="email" placeholder=" E mail ID" name="email">
					</div>
				</div>

				<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" name="forgot_btn">Confirm</button>
					</div>
				</div>
			</form>
		</body>
		</html>