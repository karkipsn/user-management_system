<?php

require_once("session.php");
require_once("user.php");

$eh = new User();

$er=$eh-> logread();
$count = count($er);

?>
<!DOCTYPE html>
<html>
<head>
  <title>UpdateLog</title>

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
              <li><a href="#">Delete</a></li>
              
            </ul>
          </li>
          <li><a href="user_home.php">View Users</a></li>
          <li><a href="import_file_index.php">Import Data</a></li>
          <li><a href="#">Export Data</a></li>
          <li><a href="department_read.php">Department</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Log <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="updatelog.php"> View Log</a></li>
              <li><a href="searchlog.php">Search Log</a></li>
              
            </ul>
          </li>  
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
         <th>SESSION</th>
         <!-- <th>ItemImage</th> -->
         <th>LOGIN TIME</th>
         <th>LOGIN PASSWORD</th>
         <th>EMAIL</th>
         <th>UPDATED PASSWORD</th>
         <th>HASHED PASSWORD</th>
         <th>UPDATED TIME</th>
       </tr>
     </thead>

     <tbody>
       <?php
       for( $i = 0; $i<$count;$i++) { ?>
         <tr>
           <td><?= $er[$i]['session']?></td>
           <td><?= $er[$i]['login_time']?></td>
           <td><?= $er[$i]['login_password']?></td>
           <td><?= $er[$i]['email']?></td>
           <td><?= $er[$i]['password']?></td>
           <td><?= $er[$i]['new_password']?></td>
           <td><?= $er[$i]['updated_date']?></td>
         </tr>
         

       <?php } ?>
     </tbody>
   </table>
 </div>
 <script>
   $(document).ready( function () {
     $('#toop').DataTable({
      dom: 'Bfrtip',
      buttons: [
      'excel', 'csv', 'copy','print', 'pdf'
      ],
    });
   });
 </script>
</body>
</html>

