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
		
		$new_password = password_hash($upass, PASSWORD_DEFAULT);

		$stmt = $this->conn->prepare("INSERT INTO users(first_name,last_name,user_email,user_pass) 
			VALUES(:fname, :lname, :umail, :upass)");

		$stmt->bindparam(":fname", $fname);
		$stmt->bindparam(":lname", $lname);
		$stmt->bindparam(":umail", $umail);
		$stmt->bindparam(":upass", $new_password);										  

		if($stmt->execute()){	
			
			return $stmt;}
			return false;	


		}

		public function email_validation($umail){


			$stmt = $this->conn->prepare("SELECT  user_email FROM users WHERE user_email=:umail ");
			$stmt->execute(array(':umail'=>$umail));

			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1){

				if($userRow['user_email']==$umail) {
					return true;

				}}
				return false;
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
						// var_dump($upass);
						// var_dump($pw);
						// //exit();
						return $harray;
					}

					return 0;
				}
			}
			public function read(){
				$stmt = $this->conn->prepare("SELECT user_id,first_name,last_name,user_email,joining_date FROM users  ORDER BY joining_date  ");
				$stmt->execute();

				$res = [];
				while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
					$res[] = $row;
				}
         //print_r($array);
				return $res;

			}
			public function update_password($umail,$upass){

				$stmt = $this->conn->prepare("SELECT user_id, user_email, user_pass FROM users WHERE user_email=:umail ");
				$stmt->execute(array(':umail'=>$umail));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);



				if($stmt->rowCount() == 1){
					$new_password = password_hash($upass, PASSWORD_DEFAULT);

					$stmt = $this->conn->prepare("UPDATE users  SET user_pass=:upass WHERE user_email=:umail");
					$stmt->execute(array(':umail'=>$umail, ':upass'=>$new_password));
					return $stmt;

					// var_dump($umail);
					// var_dump($upass);
					// var_dump($new_password);
					// exit();

				}
				return false;

			}


			public function is_loggedin($sess)
			{
				if(isset($sess))
				{
					return true;
				}
				return false;
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