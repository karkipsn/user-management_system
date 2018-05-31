<?php

require_once("session.php");

require_once("user.php");
$auth_user = new USER();

$u=$auth_user->read();

if($u !=""){

	$num = $u->rowCount();

	if($num>0){
		$auth_user=array();
		$auth_user["users"]=array();

    // retrieve our table contents into the array called users

		while ($row = $u->fetch(PDO::FETCH_ASSOC)) {

			extract($row);

			$ujson=array("user_id" => $user_id,
				"first_name" => $first_name,
				"last_name" => $last_name,
				"user_email" => $user_email,
				"joining_date" => $joining_date);

			array_push($auth_user["users"],$ujson);
		}
    //Echo the $results array in a JSON format so that we can
   //easily handle the results with JavaScript / JQuery
		// echo json_encode($auth_user);

	}
	else
	{
		echo json_encode(
			array("message" => "No users found.")
		);
	}}
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
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="#">Upload</a></li>
            <li><a href="#">Delete</a></li>
            <li><a href="#">Create</a></li>
          </ul>
        </li>
        <li><a href="user_home.php">View Users</a></li>
        <li><a href="#">Categories</a></li>
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
<?php    echo json_encode($auth_user); ?>
	</div>