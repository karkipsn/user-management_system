<?php

require_once('database.php');

class Category{

	private $conn;

	public $id;
    public $name;
    public $description;
    public $created;


    public function __construct(){

    	$database = new Database();
    	$db->$database->getConnection();
    	$this->conn =$db;
    }

}

?>