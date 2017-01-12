<?php
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	$name = $_POST['username'];
	$pass = $_POST['password'];
	
	$user = User::authenticateUser($name, $pass);
	if($user != NULL){
		session_start();
		$_SESSION['userid'] = $user->getID();
		header("Location: profile.php");
		die();
	}
}

include('includes/templates/login.php');