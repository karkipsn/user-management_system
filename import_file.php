<?php


require_once 'session.php';
require_once("employee.php");

$eu = new Employee();

if(isset($_POST["import_btn"]))
{
 $file = $_FILES["file"]["tmp_name"];

 $file_open = fopen($file,"r");
 
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
  
  $e_name = $csv[0];
  $e_add = $csv[1];
  $e_depart = $csv[2];
  $e_title = $csv[3];
  $e_dob = $csv[4];
  $e_join_date = $csv[5]; 
  
   $eu->add_employee($e_name,$e_add,$e_depart,$e_title,$e_dob,$e_join_date);

  // $stmt = $DBcon->prepare("INSERT INTO employee(employee_name,employee_designation,employee_salary) VALUES(:employee_name,:employee_designation,:employee_salary)");

  // $stmt->bindparam(':employee_name', $employee_name);
  // $stmt->bindparam(':employee_designation', $employee_designation);
  // $stmt->bindparam(':employee_salary', $employee_salary);
  // $stmt->execute();
 }
}

echo "CSV Imported Successfully";
?>
