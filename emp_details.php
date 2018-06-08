<?php

require_once("session.php");
require_once("employee.php");

$eh = new Employee();


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

     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>


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
              <li><a href="employee_search.php">Search</a></li>
              <li><a href="employee_delete.php">Delete</a></li>

            </ul>
          </li>
          <li><a href="user_home.php">View Users</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Task <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="task_create.php">Task</a></li>
              <li><a href="emp_details.php">Employee Details</a></li>
              
            </ul>
          </li>
          <li><a href="import_file_index.php">Import Data</a></li>
          <li><a href="export_file.php">Export Data</a></li>
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
    <legend><center><h2><b>Employee Tasks Searching</b></h2></center></legend><br>

    <form class="form-horizontal"  method="get" action="emp_details.php">

      <div class="form-group">
        <label class="control-label col-sm-2" for="keyword">Employee Id:</label>
        <div class="col-sm-6">          
          <input type="text" class="form-control" id="keyword" placeholder="Emp. Id" name="keyword">
        </div>
      </div>
      

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default" name="esearch_btn">Submit</button>
        </div>
      </form>

      <table id="toop" class="table table-bordered">
       <!-- class is accessed from the datatables imported -->
       <thead>
         <tr>
           <th>EMP ID</th>
           <!-- <th>ItemImage</th> -->
           <th>EMP Name</th>
           <th>EMP Depart</th>
           <th>Task Title</th>
           <th>Task Description</th>
           <th>Task Attach</th>
           <th>Task Deadline</th>
           
         </tr>
       </thead>

       <tbody>

         <?php
         $emp_id = $_GET['keyword'];
         $sr=$eh->employee_detail_search($emp_id);
          $row= count($sr);

        // if(isset($_POST['esearch_btn'])){

         for ($i = 0;$i< $row; $i++ ) { ?>
           <tr>

             <td><?= $sr[$i]['emp_id']?></td>
             <td><?= $sr[$i]['t_name']?></td>
             <td><?= $sr[$i]['t_depart']?></td>
             <td><?= $sr[$i]['t_title']?></td>
             <td><?= $sr[$i]['t_desc']?></td>

            <!--  <td  > <?php  echo "<img src ='images/".$sr[$i]['t_attach']." '' height='92' width='92' >"  ?> 
             <div style="margin-top:10px;"></div></td> -->
             <!-- for using while conditions  -->

            <td><img src="<?= $sr[$i]['t_attach'] ?>" height="92" width="92">
       <div style="margin-top:10px;"></div></td>
             
             <td><?= $sr[$i]['t_deadline']?></td>

           </tr>


         <?php } ?>
       </tbody>
     </table>
   </div>
   <script>
     $(document).ready( function () {
       $('#toop').DataTable(
        {
        dom: 'Bfrtip',
    buttons: [
        'excel', 'csv', 'copy','print', 'pdf'
    ],
       });
     });
   </script>
 </body>
 </html>
