<?php
require_once("session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

</head>

<body>
	<!-- Navigation Class Starts Here -->

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#">Products Details</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php">Home</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Upload</a></li>
							<li><a href="#">Delete</a></li>
							<li><a href="product_create_home.php">Create</a></li>
						</ul>
					</li>
					<li><a href="#">View Users</a></li>
					<li><a href="category_read.php">Categories</a></li>
					<li><a href="#">About Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Container Starts  -->

	<div class="container">
		<table id="toop" class="table table-bordered">
			<caption><h2>USERS TABLE</h2>  </caption>
			<thead>
				<tr>
					<th >Id</th>
					<th>First_Name</th>
					<th>Last_Name</th>
					<th>Email</th>	
					<th>Date</th>
				</tr>
			</thead>

			<tbody>
				<?php 

				require_once("user.php");

				$table = new USER();

		// select all tasks if page is visited or refreshed
				$p = $table->read();

				$i = 1; while ($row=$p->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td class="user_id"> <?php echo $row['user_id']; ?> </td>
						<td class="first_name"> <?php echo $row['first_name']; ?> </td>
						<td class="last_name"> <?php echo $row['last_name']; ?> </td>
						<td class="user_email"> <?php echo $row['user_email']; ?> </td>
						<td class="joining_date"> <?php echo $row['joining_date']; ?> </td>

					</tr>
					<?php $i++; } ?>	
				</tbody>
			</table>

			<a href="users_json.php" style="color: red;">JSON View of Users</a>
		</div>
		<script>
			$(document).ready( function () {
				$('#toop').DataTable();
			});
		</script>
		
		<!--//displays whole table but not other properties of pagination and others
		 <script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip(); 
			});
		</script> -->
	</body>
	</html>


		<!-- <?php  if (isset($_SESSION['user_session'])) : ?>

			<div class="sec">
				<h3>Welcome <strong><?php echo($_SESSION['user_session']); ?></strong>!!!</h3> 
				<h5> Enjoy Your Day</h5>
			</div>

			<small>
				<a href="logout.php?logout=true" style="color: red;">logout</a>

			</small><br/>

			<small>
				<a href="users_json.php" style="color: red;">JSON View of Users</a>

			</small>
		<?php endif ?>

		<a href="p_index.php" style="color: red;">View Products</a>
	-->

	