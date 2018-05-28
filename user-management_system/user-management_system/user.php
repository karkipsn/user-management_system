<?php

require_once 'database.php';

class USER{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->getConnection();
		$this->conn = $db;
	}

	public function runQuery($sql){
		$stmt= $this->conn->prepare($sql);
		return $stmt;
	}

	public function register($fname,$lname,$umail,$upass){
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(first_name,last_name,user_email,user_pass) 
				VALUES(:fname, :lname, :umail, :upass)");

			$stmt->bindparam(":fname", $fname);
			$stmt->bindparam(":lname", $lname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  

			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	

	}

	public function login($umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_email, user_pass FROM users WHERE user_email=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

}


?>