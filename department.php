<?php

require_once ('database.php');

class Department{
	private $conn;

	public $d_id;
	public $e_depart;
	

	public function __construct(){
		$database = new Database();
		$db = $database->getConnection();
		$this->conn = $db;
	}

	public function redirect($url)
	{
		header("Location: $url");
	}


 	public function read_department(){

 		$stmt = $this->conn->prepare("SELECT * FROM department");

		if($stmt->execute()){
			$res=[];
			while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
				$res[] = $row;
			}
         //print_r($array);
			return $res;
		}

		return false;
		
}}

?>