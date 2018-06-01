<?php

require_once ('database.php');

class Department{
	private $conn;

	public $d_id;
	public $d_name;
	

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

		$stmt->execute();

		return $stmt;

 	}
}

?>