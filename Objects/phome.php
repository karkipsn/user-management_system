<?php

require_once("../session.php");
require_once("products.php");

$ph = new Products();

$pr=$ph->read_products();



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
      <a class="navbar-brand" href="#">Products Details</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li ><a href="../home.php">Home</a></li>
          <li ><a href="phome.php">PHome</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="product_update_form.php">Update</a></li>
            <li><a href="#">Delete</a></li>
            <li><a href="product_create_form.php">Create</a></li>
          </ul>
        </li>
        <li><a href="user_home.php">View Users</a></li>
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
	<!-- class is accessed from the datatables imported -->
   <thead>
     <tr>
       <th>Item ID</th>
       <!-- <th>ItemImage</th> -->
       <th>Item Name</th>
       <th>Item Description</th>
       <th>Item Price</th>
       <th>Category Id</th>
       <th>Category Name</th>
        <th>Action</th>
    </tr>
   </thead>

   <tbody>
     <?php
        $i = 0; while ($rowCount=$pr->fetch(PDO::FETCH_ASSOC)) { ?>
     <tr>
       <td><?= $rowCount['p_id']?></td>
     <!--   <td><img src="<?= $product[$i]['ipic'] ?>" height="92" width="92">
       <div style="margin-top:10px;">By: <a href="#" style="color:blue;"> <?= $product[$i]['uname'] ?></a></div></td> -->
       <td><?= $rowCount['name']?></td>
       <td><?= $rowCount['description']?></td>
       <td><?= $rowCount['price']?></td>
       <td><?= $rowCount['category_id']?></td>
       <td><?= $rowCount['category_name']?></td>
       <td><a href="homeinfo.php ?>  ">Want to buy</a></td>
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

