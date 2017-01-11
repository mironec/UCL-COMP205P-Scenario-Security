<?php
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
		global $db;
		/*
		$statement = $db->prepare("UPDATE user SET username = :username, password = :password, email = :email, bio = :bio, admin = :isAdmin WHERE user_id = :userid");
		$statement->execute(array(
			':username' => $this->username,
			':password' => $this->password,
			':email' => $this->email,
			':bio' => $this->bio,
			':isAdmin' => $this->isAdmin,
			':userid' => $this->userid
		));*/
		$db->query("UPDATE user SET username = '".$this->username."', password = '".$this->password."', email = '".$this->email."', bio = '".$this->bio."', admin = '".$this->isAdmin."' WHERE user_id = '".$this->userid."'");
	}
	
	public static function getByUsername($username){
		global $db;
		/*$statement = $db->prepare("SELECT * FROM user WHERE username = :username");
		$statement->execute(array(':username' => $username));*/
		$statement = $db->query("SELECT * FROM user WHERE username = '$username'");
		$row = $statement->fetch();
		
		if($row !== FALSE){
			return new User($row['user_id'], $row['username'], $row['password'], $row['email'], $row['bio'], $row['admin']);
		}
		
		return NULL;
	}
	
	public static function getUserByID($userid){
		global $db;
		/*$statement = $db->prepare("SELECT * FROM user WHERE user_id = :id");
		$statement->execute(array(':id' => $userid));*/
		$statement = $db->query("SELECT * FROM user WHERE user_id = '$userid'");
		$row = $statement->fetch();
		
		if($row !== FALSE){
			return new User($row['user_id'], $row['username'], $row['password'], $row['email'], $row['bio'], $row['admin']);
		}
		
		return NULL;
	}
	
	public static function createUser($username, $password, $email){
		global $db;
		$user = User::getByUsername($username);
		if($user != NULL) return FALSE;
		/*$statement = $db->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
		$statement->execute(array(':username' => $username, ':password' => $password, ':email' => $email));*/
		$db->query("INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')");
		return self::getByUsername($username);
	}
	
	public static function getAllUsers(){
		global $db;
		$statement = $db->query("SELECT * FROM user");
		$arr = array();
		foreach($statement as $row){
			array_push($arr, new User($row['user_id'], $row['username'], $row['password'], $row['email'], $row['bio'], $row['admin']));
		}
		return $arr;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getID(){
		return $this->userid;
	}
	
	public function getBio(){
		return $this->bio;
	}
	
	public function setBio($bio){
		$this->bio = $bio;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
}