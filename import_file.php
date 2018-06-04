<?php


require_once 'session.php';
require_once("employee.php");

$eu = new Employee();

if(isset($_POST["import_btn"]))
{
	$file = $_FILES["file"]["tmp_name"];

	$file_open = fopen($file,"r");

	while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
	{

		$e_id = $csv[0];
		$e_name = $csv[1];
		$e_add = $csv[2];
		$e_depart = $csv[3];
		$e_title = $csv[4];
		$e_dob = $csv[5];
		$e_join_date = $csv[6]; 

		if($eu->add_employee($e_name,$e_add,$e_depart,$e_title,$e_dob,$e_join_date))
		{

			$er=$eu->read_employee();
		}
		else{
			echo 'Error in Adding csv';
		}

	}
}

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
				<a class="navbar-brand" href="#">Employee Details</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="user_home.php">View Users</a></li>
					<li><a href="import_file_index.php">Import Data</a></li>
					<li><a href="#">Export Data</a></li>
					<li><a href="department_read.php">Department</a></li>
					
				</div>
			</div>
		</nav>

		<!-- Container Starts  -->

		<div class="container">
			<table id="toop" class="table table-bordered">
				<!-- class is accessed from the datatables imported -->
				<?php echo 'CSV imported Successfully' ?>
				<thead>
					<tr>
						<th>EMP ID</th>
						<!-- <th>ItemImage</th> -->
						<th>EMP Name</th>
						<th>EMP Add></th>
						<th>EMP Depart</th>
						<th>EMP Title</th>
						<th>EMP DOB</th>
						<th>EMP DOJ</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$i = 0; while ($rowCount=$er->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td><?= $rowCount['e_id']?></td>
							<td><?= $rowCount['e_name']?></td>
							<td><?= $rowCount['e_add']?></td>
							<td><?= $rowCount['e_depart']?></td>
							<td><?= $rowCount['e_title']?></td>
							<td><?= $rowCount['e_dob']?></td>
							<td><?= $rowCount['e_join_date']?></td>
						</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
		<script>
			$(document).ready( function () {
				$('#toop').DataTable();
			});
		</script>
	</body>
	</html>
