<?php

require_once('../../database.php');

class Category{

	private $conn;

	public $c_id;
    public $name;
    public $description;
    public $created;

public function __construct(){
		$database = new Database();
		$db = $database->getConnection();
		$this->conn = $db;
	}
    
    public function read_category(){
    	$stmt = $this->conn->prepare("SELECT * from category");
    	$stmt->execute();
        
    	$res = [];
        while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
        }
         //print_r($array);
        return $res;

    }

}

?>