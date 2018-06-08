<?php

require_once 'database.php';

class USER{

	private $conn;
	public $session_time;

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
			
			return $stmt;
		}
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

			$harray= "";
			if($stmt->rowCount() == 1){

				$harray=$userRow['user_email'];
				$pw = $userRow['user_pass'];

				if(password_verify($upass,$pw))
				{
					
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

				$arr[]=$userRow['user_email'];
				$arr[] = $userRow['user_pass'];

				$new_password = password_hash($upass, PASSWORD_DEFAULT);

				$stmt = $this->conn->prepare("UPDATE users  SET user_pass=:upass WHERE user_email=:umail");
				$stmt->execute(array(':umail'=>$umail, ':upass'=>$new_password));
				
				$arr[] = $userRow['user_pass'];
					// var_dump($umail);
					// var_dump($upass);
					// var_dump($new_password);
					// exit();
				return $arr;

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



		function log( $umail,$password, $hpass,  $session)
		{

			$stmt =$this->conn->prepare("INSERT INTO log ( email,password, new_password, session, updated_date)
				VALUES(:umail, :pass, :npass, :user, :ud)");
			
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":pass", $password);
			$stmt->bindparam(":npass", $hpass);
			$stmt->bindparam(":user", $session);
					// $stmt->bindparam(":jd", $joined_date);										  
			$stmt->bindparam(":ud", $updated_date);										  

			$stmt->execute();

		}


		function loginlog( $password, $user)
		{

			$stmt =$this->conn->prepare("INSERT INTO loginlog (  name, password )
				VALUES( :user , :pass )");
			
			$stmt->bindparam(":user", $user);
			$stmt->bindparam(":pass", $password);
			
			$stmt->execute();

		}


		public function logread(){

			$stmt = $this->conn->prepare("SELECT e.session,d.login_time, e.email,d.password as login_password, e.password , e.new_password, e.updated_date FROM log e INNER JOIN loginlog d ON e.session = d.name ");


			$stmt->execute();

			$res = [];
			
			while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
				$res[] = $row;
			}
         //print_r($array);
			return $res;
			
		}

		public function log_search($names){
			

			$stmt = $this->conn->prepare("SELECT e.session,d.login_time, e.email,d.password as login_password, e.password , e.new_password, e.updated_date FROM log e LEFT JOIN loginlog d ON e.session = d.name  WHERE e.session = '$names' ");

			
			if($stmt->execute())
			{

				$res = [];
				while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
					$res[] = $row;
				}
         //print_r($array);
				return $res;
			}

			return false;
			
		}
	}


	?>

