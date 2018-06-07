<?php

require_once("session.php");
require_once ('task.php');
require_once ('employee.php');

$task= new Task();
$eh = new Employee();

$er=$eh->read();
$count = count($er);


if(isset($_POST['task_create_btn'])){

  $emp_id = strip_tags($_POST['emp_id']);
  $t_title = strip_tags($_POST['t_title']);
  $t_desc = strip_tags($_POST['t_desc']);
  $t_deadline = strip_tags($_POST['t_deadline']);
  // Get image namet_deadline
  $t_attach = $_FILES['t_attach']['name'];
  $target = "images/".basename($t_attach);


  $task->create_task($emp_id,$t_title,$t_desc,$target,$t_deadline);


  if (move_uploaded_file($_FILES['t_attach']['tmp_name'], $target)) {
    $task->redirect('task_create.php?success');
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
              <li><a href="employee_create_form.php">Create</a></li>
              <li><a href="employee_update_form.php">Update</a></li>

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

    <form class="form-horizontal"  method="post" action="task_create.php" enctype="multipart/form-data">

      <div class="form-group">
        <label class="control-label col-sm-2" for="emp_id">Employee Id:</label>
        <div class="col-sm-6">          
          <select class="form-control" id="emp_id" placeholder="Emp. Id" name="emp_id">
            <option value=" "> </option>

        <?php
         for( $i = 0; $i<$count;$i++) {
            echo '<option value='.$er[$i]['emp_id'].'>' .$er[$i]['emp_id']. '</option>';
          }
        ?> 
           
          </select>
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for="t_title">Emp Title:</label>
        <div class="col-sm-6">          
          <input type="name" class="form-control" id="t_title" placeholder="TAsks Title" name="t_title">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="t_desc">Employee Task desc:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="t_desc" placeholder="desc" name="t_desc">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="t_attach">Attach:</label>
        <div class="col-sm-6">          
          <input type="file" class="form-control" id="t_attach" placeholder="JOb Title" name="t_attach">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="t_deadline"> Deadline:</label>
        <div class="col-sm-6">          
          <input type="date" class="form-control" id="t_deadline" placeholder="Deadline Employee" name="t_deadline">
        </div>
      </div>
      

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="task_create_btn">Submit</button>
        </div>
      </div>
    </form>



    <?php
    if(isset($_GET['success']))
    {
      ?>
      <div class="form-group">
        <center><h4><b> Thanks task  Is added.</b></h4></center>
      </div>
      <?php
    }
    ?>
  </div>

</body>
</html>


