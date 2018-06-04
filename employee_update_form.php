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
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employees <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="employee_create_form.php">Create</a></li>
              <li><a href="employee_update_form.php">Update</a></li>
              <li><a href="#">Delete</a></li>

            </ul>
          </li>
          <li><a href="user_home.php">View Users</a></li>
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

  <div class= "d-flex justify-content-center align-items-center container ">
    <legend><center><h2><b>Product Form</b></h2></center></legend><br>

    <form class="form-horizontal"  method="post" action="employee_update.php">

      <div class="form-group">
        <label class="control-label col-sm-2" for="p_id">Employee Id:</label>
        <div class="col-sm-6">          
          <input type="number" class="form-control" id="p_id" placeholder="Emp. Id" name="e_id">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for="e_name">Emp Name:</label>
        <div class="col-sm-6">          
          <input type="name" class="form-control" id="e_name" placeholder="Name of Employee" name="e_name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="e_depart">Employee Department:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="e_depart" placeholder="epartment" name="e_depart">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="e_title">Title:</label>
        <div class="col-sm-6">          
          <input type="text" class="form-control" id="e_title" placeholder="JOb Title" name="e_title">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="e_add"> Employee Address:</label>
        <div class="col-sm-6">          
          <input type="text" class="form-control" id="e_add" placeholder="Address of Employee" name="e_add">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="e_join_date">Join Date:</label>
        <div class="col-sm-6">          
          <input type="date" class="form-control" id="e_join_date" placeholder="Join Date" name="e_join_date">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="e_dob">DOB:</label>
        <div class="col-sm-6">          
          <input type="date" class="form-control" id="e_dob" placeholder="Date of birth" name="e_dob">
        </div>
      </div>


      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="eupdate_btn">Submit</button>
        </div>
      </div>
    </form>


    <?php
    if(isset($_GET['updated']))
    {
      ?>
      <div class="form-group">
        <center><h4><b> Thanks Product  Is added.</b></h4></center>
      </div>
      <?php
    }
    ?>
  </div>

</body>
</html>


