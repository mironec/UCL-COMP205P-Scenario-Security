<?php
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

if(isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['password']) && !empty($_GET['password'])){
	$name = $_GET['username'];
	$pass = $_GET['password'];
	
	$user = User::authenticateUser($name, $pass);
	if($user != NULL){
		/*session_start();
		$_SESSION['userid'] = $user->getID();*/
		setcookie('userid', $user->getID(), time() + 86400*30, "/");
		header("Location: profile.php");
		die();
	}
}

include('includes/templates/login.php');