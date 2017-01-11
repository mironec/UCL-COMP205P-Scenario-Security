<?php
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

$user = NULL;
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
	throwOut();
}
if(isset($_GET['user']) && !empty($_GET['user'])){
	$user = User::getByUsername($_GET['user']);
}
if(isset($_GET['deleteUser']) && !empty($_GET['deleteUser'])){
	User::deleteUserByID($_GET['deleteUser']);
}

if($user == NULL) {
	require_once('includes/requireAuthenticated.php');
	$currentuser = User::getUserByID($_SESSION['userid']);

	if(isset($_POST['bio']) && isset($_POST['email'])){
		$currentuser->setBio($_POST['bio']);
		$currentuser->setEmail($_POST['email']);
		$currentuser->saveToDatabase();
	}
	include('includes/templates/profile.php');
}
else {
	session_start();
	if(isset($_SESSION['userid'])) $currentuser = User::getUserByID($_SESSION['userid']);
	else session_destroy();
	include('includes/templates/otherProfile.php');
}