<?php

require_once ('database.php');

class Task{
	private $conn;

	public $emp_id;
	public $t_title;
	public $t_desc;
	public $t_attach ;
	public $t_deadline;
	

	public function __construct(){
		$database = new Database();
		$db = $database->getConnection();
		$this->conn = $db;
	}
	public function redirect($url)
	{
		header("Location: $url");
	}


 	public function create_task($emp_id,$t_title,$t_desc,$t_attach,$t_deadline){

 		$stmt = $this->conn->prepare("INSERT INTO task(emp_id, t_title, t_desc, t_attach, t_deadline) 
    VALUES(:tid, :tt, :td, :ta, :tdl )");

  $stmt->bindparam(":tid", $emp_id);
  $stmt->bindparam(":tt", $t_title);
  $stmt->bindparam(":td", $t_desc);
  $stmt->bindparam(":ta", $t_attach);
  $stmt->bindparam(":tdl", $t_deadline);

  $stmt->execute();
		return $stmt;

 	}
}

?>
  
