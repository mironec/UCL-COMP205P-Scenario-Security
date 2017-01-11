<?php
require_once("includes/database.php");

class User {
	
	private $userid;
	private $username;
	private $password;
	private $email;
	private $bio;
	private $isAdmin;
	
	public function __construct($userid, $username, $password, $email = "", $bio = "This user has not set their bio yet.", $isAdmin = FALSE){
		$this->userid = $userid;
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
		$db = Database::getInstance();
	}
	
	public static function getByUsername($username){
		$db = Database::getInstance();
		$statement = $db->prepare("SELECT * FROM user WHERE username = :username");
		$statement->execute(array(':username' => $username));
		$row = $statement->fetch();
		
		if($row !== FALSE){
			return new User($row['user_id'], $row['username'], $row['password'], $row['email'], $row['bio'], $row['isAdmin']);
		}
		
		return NULL;
	}
	
	public static function createUser($username, $password, $email){
		$user = User::getByUsername($username);
		if($user != NULL) return FALSE;
		$db = Database::getInstance();
		$statement = $db->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
		$statement->execute(array(':username' => $username, ':password' => $password, ':email' => $email));
		return self::getByUsername($username);
	}
	
	public function getUsername(){
		return $username;
	}
}