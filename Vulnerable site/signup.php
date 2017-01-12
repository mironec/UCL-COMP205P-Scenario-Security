<?php
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

if(isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['password']) && !empty($_GET['password']) && isset($_GET['email']) && !empty($_GET['email'])){
	$name = $_GET['username'];
	$pass = $_GET['password'];
	$mail = $_GET['email'];
	
	$user = User::createUser($name, $pass, $mail);
	if($user != FALSE){
		/*session_start();
		$_SESSION['userid'] = $user->getID();*/
		setcookie('userid', $user->getID(), time() + 86400*30, "/");
		header("Location: profile.php");
		die();
	}
}

include('includes/templates/signup.php');