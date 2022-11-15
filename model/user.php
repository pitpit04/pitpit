<?php 

/**
 * 
 */
class User extends DB
{
	
	function __construct(DB $conn)
	{
		$this->conn = $conn->conn;
	}


	function all_data(){
		$sql = "SELECT * FROM todos";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function login_user($username, $password) {
		$sql = "SELECT * FROM `user` WHERE `username`= :username AND `password` = :password";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue('username', $username);  
		$stmt->bindValue('password', $password);
		$stmt->execute();

		return $stmt;
	} 
	public function register($requests)
	{
		$sql = "INSERT INTO `user`(`Fullname`, `Username`, `email`, `Password`) VALUES(:fullname, :username, :email,
			:password)";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue('fullname', $requests['fullname']);  
		$stmt->bindValue('username', $requests['username']);
		$stmt->bindValue('email', $requests['email']);
		$stmt->bindValue('password', $requests['password']);
		$stmt->execute();

		return $stmt;
	}
}

?>