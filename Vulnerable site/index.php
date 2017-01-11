<?php
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

if(isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['password']) && !empty($_GET['password'])){
	$name = $_GET['username'];
	$pass = $_GET['password'];
	
	$user = User::getByUsername($name);
	if($user != NULL && $user->checkPassword($pass)){
		session_start();
		$_SESSION['userid'] = $user->getID();
		header("Location: profile.php");
		die();
	}
}

include('includes/templates/login.php');