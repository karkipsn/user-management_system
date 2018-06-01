<?php

require_once("../../session.php");
require_once("../products.php");

$pc = new Products();


if(isset($_POST['pupdate_btn'])){

  $p_id = strip_tags($_POST['p_id']);
  $pname = strip_tags($_POST['pname']);
  $pdes = strip_tags($_POST['pdes']);
  $pprice = strip_tags($_POST['pprice']);
  $pcat_id = strip_tags($_POST['pcat_id']);
  
  $errorcount=0;
//$fname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);

   if($p_id=="" ||!filter_var($p_id, FILTER_VALIDATE_INT)) {
    $error = 'Please enter a valid email address !';
    $errorcount++;
  }

  if($pname=="" || !filter_var($pname, FILTER_SANITIZE_STRING) )  {
    $error = "Please enter valid first name"; 
    $errorcount++;
  }
  
  
  if($pdes=="" || !filter_var($pdes, FILTER_SANITIZE_STRING)) {
    $error = "Please enter  valid last name"; 
    $errorcount++;
  }
  
  
  if($pprice=="" ||!filter_var($pprice, FILTER_VALIDATE_FLOAT)) {
    $error = 'Please enter a valid email address !';
    $errorcount++;
  }
  
  
  if($pcat_id=="" ||!filter_var($pcat_id, FILTER_VALIDATE_INT)) {
    $error = 'Please enter a valid email address !';
    $errorcount++;
  }

  

  if($errorcount == 0)
  {
    
      $pc->update_products($p_id,$pname,$pdes,$pprice,$pcat_id);
      $pc->redirect('product_create_form.php?added');

    }
    else{
      echo 'Failed';
    } 
  }
    
?>

