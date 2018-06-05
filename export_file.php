
<?php

require_once 'session.php';
require_once("employee.php");

$eu = new Employee();

if(isset($_POST["export_btn"]))
{

  $stmt= $eu->read();

  $fp = fopen('Exported/file.csv', 'w');

  while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

    fputcsv($fp, $row);
}    

fclose($fp);
echo 'Successfully exported';

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Import Excel to MySQL using PHP and Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

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
    </ul>
    </div>
  </div>
</nav>

    <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
        <div class="row"><!-- row class is used for grid system in Bootstrap-->
            <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Export Excel </h3>
                    </div>
                    <div class="panel-body">


                        <form method="post" action="export_file.php" enctype="multipart/form-data">
                            <fieldset>

                                <input class="btn btn-success" type="submit" name="export_btn" value="Submit"/>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
