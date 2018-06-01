<?php

require_once ('database.php');


 class Employee 
 {
 	private $conn;

 	public $e_id;
 	public $e_name;
 	public $e_depart;
 	public $e_title;
 	public $e_add;
 	public $e_dob;
 	public $e_join_date;

 	
 	function __construct()
 	{
 		$database=new Database();
 		$db =$database->getConnection();
 		$this->conn= $db;
 	}

 	public function redirect($url)
	{
		header("Location: $url");
	}


 	public function read_employee(){

 		$stmt = $this->conn->prepare("SELECT * FROM employee");

		$stmt->execute();

		return $stmt;

 	}

 	 public function update_employee($e_id,$ename,$eadd, $edepart, $etitle, $edob, $ejoin_date){

 		$stmt = $this->conn->prepare("UPDATE employee  SET e_name = :ename, e_add = :eadd, 
 	 		      e_depart = :edepart, e_title = :etitle, e_dob = :edob , e_join_date = :ejd  WHERE e_id = :eid");
			
		 $stmt->execute(array(":eid"=>$e_id, ":ename"=>$ename, ":eadd"=>$eadd, ":edepart"=>$edepart,":etitle"=>$etitle, ":edob"=>$edob,":ejd"=>$ejoin_date));

		 return $stmt;

 	 }


 	public function add_employee(){

 		$stmt = $this->conn->prepare("INSERT INTO employee(e_name,e_add, e_depart, e_title, e_dob, e_join_date) 
			VALUES(ename,eadd, edepart, etitle, edob, ejd)");

		$stmt->bindparam(":ename", $e_name);
		$stmt->bindparam(":eadd", $e_add);
		$stmt->bindparam(":edepart", $e_depart);
		$stmt->bindparam(":etitle", $e_title);
		$stmt->bindparam(":edob", $e_dob);
		$stmt->bindparam(":ejd", $e_join_date);										  

		if($stmt->execute()){
			return true;
		}

		return false;

 	}
 }



	
?>