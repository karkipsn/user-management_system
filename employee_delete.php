<?php

require_once("session.php");
require_once("employee.php");

$eh = new Employee();
$er=$eh->read();
$count = count($er);

if(isset($_POST['edelete_btn'])){

  $emp_id = strip_tags($_POST['emp_id']);

  $er=$eh->delete_employee($emp_id);
  
  if(!$er == false){
    echo 'Successfully deleted';
  }
  else{
    echo 'Error in Process';
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
        <a class="navbar-brand" href="#">Employee Details Delete</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class><a href="home.php">Home</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Container Starts  -->

  <div class= "d-flex justify-content-center align-items-center container ">
    <legend><center><h2><b>Delete Form</b></h2></center></legend><br>

    <form class="form-horizontal"  method="post" action="employee_delete.php">

      <div class="form-group">
        <label class="control-label col-sm-2" for="emp_id">Employee Id:</label>
        <div class="col-sm-6">          
          <select class="form-control" id="emp_id" placeholder="Enter Emp. Id you eant to delete" name="emp_id">
            <option value=" "> </option>

        <?php
         for( $i = 0; $i<$count;$i++) {
            echo '<option value= >' .$er[$i]['emp_id']. '</option>';
          }
        ?> 
        <!-- '.$er[$i]['emp_id'].' -->
           
          </select>
        </div>
      </div>

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="edelete_btn">Delete</button>
        </div>
      </div>
    </form>

  </div>
</body>
</html>

