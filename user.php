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

	public function email_validation($umail){
		try{

		$stmt = $this->conn->prepare("SELECT  user_email FROM users WHERE user_email=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1){

               if($userRow['user_email']==$umail) {
				return true;
				
			}}
		}
			
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public function login($umail,$upass)
	{
		
			$stmt = $this->conn->prepare("SELECT user_id, user_email, user_pass FROM users WHERE user_email=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			   $harray = "";
			if($stmt->rowCount() == 1){

			    $harray=$userRow['user_email'];
			    $pw = $userRow['user_pass'];
			
				if(password_verify($upass,$pw))
				{
					//$_SESSION['user_session'] = $userRow['user_id'];
					return $harray;
				}
				else
				{
					return $pw;
				}}
	}
	public function update_password($umail,$upass){

			$stmt = $this->conn->prepare("SELECT user_id, user_email, user_pass FROM users WHERE user_email=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			  
			if($stmt->rowCount() == 1){
						$new_password = password_hash($upass, PASSWORD_DEFAULT);

				  $stmt = $this->conn->prepare("UPDATE users  SET user_pass=:upass WHERE user_email=:umail");
                  $stmt->execute(array(":umail"=>$user_email, ":upass"=>$new_password));
                  return $stmt;

			}


	}

	

	public function is_loggedin($sess)
	{
		if(isset($sess))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout($sess)
	{
		session_destroy();
		unset($sess);
		return true;
	}
	

}


?>