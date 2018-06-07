<?php

require_once("session.php");
require_once("employee.php");

$eh = new Employee();

$er=$eh->read();
$count = count($er);

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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <a class="navbar-brand" href="#">Employee Details</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employees <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="employee_read_all.php">View Employees</a></li>
          	<li><a href="employee_create_form.php">Create</a></li>
            <li><a href="employee_update_form.php">Update</a></li>
            <li><a href="#">Delete</a></li>
            
          </ul>
        </li>
        <li><a href="user_home.php">View Users</a></li>
        <li><a href="import_file_index.php">Import Data</a></li>
        <li><a href="#">Export Data</a></li>
        <li><a href="department_read.php">Department</a></li>
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
	<!-- class is accessed from the datatables imported -->
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
       for( $i = 0; $i<$count;$i++) { ?>
     <tr>
       <td><?= $er[$i]['emp_id']?></td>
       <td><?= $er[$i]['e_name']?></td>
       <td><?= $er[$i]['e_add']?></td>
       <td><?= $er[$i]['e_depart']?></td>
       <td><?= $er[$i]['e_title']?></td>
       <td><?= $er[$i]['e_dob']?></td>
       <td><?= $er[$i]['e_join_date']?></td>
       <td class="delete"> 
          <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
        </td>
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

