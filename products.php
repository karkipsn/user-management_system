<?php

require_once('database.php');

class Products{

	private $conn;

	public $p_id;
	public $name;
	public $description;
	public $price;
	public $category_id;
	public $category_name;
	public $created;

	public function __construct(){
		$database = new Database();
		$db = $database->getConnection();
		$this->conn = $db;
	}

	public function upload_products($pname,$pdes,$pprice,$pcat_id){
		
		$stmt = $this->conn->prepare("INSERT INTO products(name,description,price,category_id) 
			VALUES(:pname, :pdes, :pprice, :pcat_id)");

		$stmt->bindparam(":pname", $pname);
		$stmt->bindparam(":pdes", $pdes);
		$stmt->bindparam(":pprice", $pprice);
		$stmt->bindparam(":pcat_id", $pcat_id);										  

		if($stmt->execute()){
			return true;
		}

		return false;

	}
	public function redirect($url)
	{
		header("Location: $url");
	}

	public function read_products(){
		$stmt = $this->conn->prepare("SELECT
                c.name as category_name, p.p_id, p.name, p.description, p.price, p.category_id
            FROM
                 products  p
                LEFT JOIN
                    category c
                        ON p.category_id = c.c_id
            ORDER BY
                c.c_id ");

		$stmt->execute();

		return $stmt;

	}

	public function update_products(){

	}
	public function delete_product(){

	}


}

?>