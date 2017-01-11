<?php
require_once("includes/database.php");

class User {
	
	private $username;
	private $password;
	private $email;
	private $bio;
	private $isAdmin;
	
	public function __construct($username, $password, $email = "", $bio = "This user has not set their bio yet.", $isAdmin = FALSE){
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->bio = $bio;
		$this->isAdmin = $isAdmin;
	}
	
	public function checkPassword($password){
		return $password == $this->password;
	}
	
	public function saveToDatabase(){
		
	}
	
	public static function getByUsername($username){
		$db = Database::getInstance();
		$statement = $db->prepare("SELECT * FROM user WHERE username = :username");
		$statement->execute(array(':username' => $username));
		$row = $statement->fetch();
		
		if($row !== FALSE){
			return new User($row['username'], $row['password'], $row['email'], $row['bio'], $row['isAdmin']);
		}
		
		return NULL;
	}
	
	public function getUsername(){
		return $username;
	}
}