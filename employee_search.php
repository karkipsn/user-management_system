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
              <li><a href="employee_read_all.php">View Employees</a></li>
              <li><a href="employee_create_form.php">Create</a></li>
              <li><a href="employee_update_form.php">Update</a></li>
              <li><a href="employee_search.php">Search</a></li>
              <li><a href="employee_delete.php">Delete</a></li>

            </ul>
          </li>
          <li><a href="user_home.php">View Users</a></li>
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

  <div class="container">

    <form class="form-horizontal"  method="post" action="employee_search.php">

      <div class="form-group">
        <label class="control-label col-sm-2" for="keyword">Employee Name:</label>
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
           <th>EMP Add></th>
           <th>EMP Depart</th>
           
           <th>EMP Title</th>
           <th>EMP DOB</th>
           <th>EMP DOJ</th>
         </tr>
       </thead>

       <tbody>
         <?php

         if(isset($_POST['esearch_btn'])){

          $keyword = strip_tags($_POST['keyword']);

          $sr=$eh->search_employee($keyword);

          $i = 0; while ($rowCount=$sr->fetch(PDO::FETCH_ASSOC)) { ?>
           <tr>
             <td><?= $rowCount['e_id']?></td>
             <td><?= $rowCount['e_name']?></td>
             <td><?= $rowCount['e_add']?></td>
             <td><?= $rowCount['e_depart']?></td>
             
             <td><?= $rowCount['e_title']?></td>
             <td><?= $rowCount['e_dob']?></td>
             <td><?= $rowCount['e_join_date']?></td>
           </tr>

         <?php }} ?>
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