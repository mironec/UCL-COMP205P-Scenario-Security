<?php
require_once("includes/databaseStart.php");
require_once('includes/models/user.php');

$user = NULL;

if(isset($_GET['action']) && $_GET['action'] == 'logout'){
	require_once('includes/requireAuthenticated.php');
	throwOut();
}
if(isset($_GET['user']) && !empty($_GET['user'])){
	$user = User::getByUsername($_GET['user']);
}
if(isset($_GET['deleteUser']) && !empty($_GET['deleteUser'])){
	User::deleteUserByID($_GET['deleteUser']);
}
if(isset($_GET['adminUser']) && !empty($_GET['adminUser'])){
	require_once('includes/requireAuthenticated.php');
	$currentuser = User::getUserByID($_COOKIE['userid']);
	if($currentuser->isAdmin()){
		$usera = User::getUserByID($_GET['adminUser']);
		if($usera != NULL){
			$usera->setAdmin($usera->isAdmin() ? 0 : 1);
			$usera->saveToDatabase();
		}
	}
}

if($user == NULL) {
	require_once('includes/requireAuthenticated.php');
	$currentuser = User::getUserByID($_COOKIE['userid']);
	if($currentuser == NULL) throwOut();

	if(isset($_POST['bio']) && isset($_POST['email'])){
		$currentuser->setBio($_POST['bio']);
		$currentuser->setEmail($_POST['email']);
		$currentuser->saveToDatabase();
	}
	include('includes/templates/profile.php');
}
else {
	//session_start();
	if(isset($_COOKIE['userid'])) $currentuser = User::getUserByID($_COOKIE['userid']);
	//else session_destroy();
	else setcookie('userid', '-1', time() - 3600, "/");
	include('includes/templates/otherProfile.php');
}