<?php
require_once("database.php");

class Redirect{
	private $conn;

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

}
	?>