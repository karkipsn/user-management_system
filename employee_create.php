<?php

require_once("session.php");

require_once("employee.php");

$eu = new Employee();

if(isset($_POST['eadd_btn'])){

  $e_name = strip_tags($_POST['e_name']);
  $e_add = strip_tags($_POST['e_add']);
  $e_depart = strip_tags($_POST['e_depart']);
  $e_title = strip_tags($_POST['e_title']);
  $e_dob = strip_tags($_POST['e_dob']);
  $e_join_date = strip_tags($_POST['e_join_date']); 
  
  $errorcount= 0;

  if($e_name=="" || !filter_var($e_name, FILTER_SANITIZE_STRING) )  {
    $error = "Please enter valid first name"; 
    $errorcount++;
  }
  
  
  if($e_add=="" || !filter_var($e_add, FILTER_SANITIZE_STRING)) {
    $error = "Please enter  valid last name"; 
    $errorcount++;
  }
  
  
  if($e_depart=="" ||!filter_var($e_depart, FILTER_SANITIZE_STRING)) {
    $error = 'Please enter a valid email address !';
    $errorcount++;
  }
  if($e_title=="" ||!filter_var($e_title, FILTER_SANITIZE_STRING)) {
    $error = 'Please enter a valid email address !';
    $errorcount++;
  }
  
  if($errorcount == 0)
  {
    $eu->add_employee($e_name,$e_add,$e_depart,$e_title,$e_dob,$e_join_date);

    $eu->redirect('employee_create_form.php?updated');

  }
  else{
    echo   'Failed to create employee';
  } 
}

?>

