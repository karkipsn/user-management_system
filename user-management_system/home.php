<?php

	require_once("session.php");
	
	require_once("user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->

		<?php  if (isset($_SESSION['user_session'])) : ?>

			<div class="header">
				<h3>Welcome <strong><?php echo($userRow['user_email']); ?></strong>!!!</h3>
				<h5> Enjoy Your Day</h5>
			</div>

			<small>
					<a href="logout.php?logout=true" style="color: red;">logout</a>
					
				</small>
		<?php endif ?>


			</div>
		</div>
	</div>
</body>
</html>