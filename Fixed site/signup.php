<?php
require_once('includes/utilities.php');
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])){
	$name = $_POST['username'];
	if($name != direscape($name)) {
		echo "That username is not allowed <br />";
		include('includes/templates/signup.php');
		die();
	}
	$pass = $_POST['password'];
	$mail = $_POST['email'];
	
	$user = User::createUser($name, $pass, $mail);
	if($user != FALSE){
		session_start();
		$_SESSION['userid'] = $user->getID();
		header("Location: profile.php");
		die();
	}
}

include('includes/templates/signup.php');