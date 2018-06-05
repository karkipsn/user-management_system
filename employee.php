<?php

require_once ('database.php');


class Employee 
{
	private $conn;

	public $e_id;
	public $emp_id;
	public $e_name;
	public $e_depart;
	public $e_title;
	public $e_add;
	public $e_dob;
	public $e_join_date;
	public $e_dep_id;


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

	public function read(){

		$stmt = $this->conn->prepare("SELECT
			d.d_id as e_dep_id, e.e_id, e.e_name, e.e_depart, e.e_title, e.e_add, e.e_dob, e.e_join_date FROM
			employee  e INNER JOIN department d ON e.e_depart = d.e_depart ORDER BY e.e_id ");

		$stmt->execute();

		return $stmt;
	}
 //RIGHT JOIN <th>EMP ID</th>



	public function employee_detail(){

		$stmt = $this->conn->prepare("SELECT
			e.e_depart as t_depart,e.e_name as t_name, t.emp_id, t.t_title, t.t_desc, t.t_attach , t.t_deadline FROM
			task t LEFT JOIN employee e ON t.emp_id = e.emp_id ORDER BY t.emp_id ");

		$stmt->execute();

		return $stmt;

	}
	public function employee_detail_search(){
		

		

		$stmt = $this->conn->prepare("SELECT
			e.e_depart as t_depart,e.e_name as t_name, t.emp_id, t.t_title, t.t_desc, t.t_attach , t.t_deadline FROM
			task t LEFT JOIN employee e ON t.emp_id = e.emp_id 
			WHERE t.emp_id = ?  ORDER BY t.emp_id");

		$stmt->bindParam(1, $this->emp_id);
	

		if($stmt->execute())
		{
			return $stmt;
		}
		
		else
		{
			echo 'Error in the keyword';
		}

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


	public function add_employee($ename,$eadd, $edepart, $etitle, $edob, $ejoin_date){

		$stmt = $this->conn->prepare("INSERT INTO employee(e_name,e_add, e_depart, e_title, e_dob, e_join_date) 
			VALUES(:ename, :eadd, :edepart, :etitle, :edob, :ejoin_date)");

		$stmt->bindparam(":ename", $ename);
		$stmt->bindparam(":eadd", $eadd);
		$stmt->bindparam(":edepart", $edepart);
		$stmt->bindparam(":etitle", $etitle);
		$stmt->bindparam(":edob", $edob);
		$stmt->bindparam(":ejoin_date", $ejoin_date);										  

		if($stmt->execute()){
			return true;
		}

		return false;

	}

	public function delete_employee($e_id){
		$stmt = $this->conn->prepare("DELETE FROM employee  WHERE e_id = $e_id");
		$stmt->execute();

		if($stmt->rowCount() == 1){

			return true;

		}
		else
		{
			return false;
		}
	}

	public function search_employee($keywords){
		
		// $stmt = $this->conn->prepare("SELECT
		// 	d.d_id as e_dep_id, e.e_id, e.e_name, e.e_depart, e.e_title, e.e_add, e.e_dob, e.e_join_date FROM
		// 	employee  e INNER JOIN department d ON e.e_depart = d.e_depart ORDER BY e.e_id  WHERE 
		// 	e.e_name LIKE '%".$keywords."%'
		// 	");

		// ? OR e.e_depart LIKE ? OR e.e_id LIKE ? ORDER BY
			//e.e_id "

		$stmt= $this->conn->prepare("SELECT * FROM employee WHERE `e_name` LIKE '%".$keywords."%' ");

    // bind
		$stmt->bindParam(1, $keywords);
		$stmt->bindParam(2, $keywords);
		$stmt->bindParam(3, $keywords);

    // execute query
		$stmt->execute();

		return $stmt;
	}
}


?>