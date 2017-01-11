<?php
require_once("includes/databaseStart.php");
require_once('includes/requireAuthenticated.php');
require_once('includes/models/user.php');

$user = NULL;
if(isset($_GET['user']) && !empty($_GET['user'])){
	$user = User::getByUsername($_GET['user']);
}
if(isset($_GET['deleteUser']) && !empty($_GET['deleteUser'])){
	User::deleteUserByID($_GET['deleteUser']);
}
$currentuser = User::getUserByID($_SESSION['userid']);

if(isset($_POST['bio']) && isset($_POST['email'])){
	$currentuser->setBio($_POST['bio']);
	$currentuser->setEmail($_POST['email']);
	$currentuser->saveToDatabase();
}

if($user == NULL && !$currentuser->isAdmin())
	include('includes/templates/profile.php');
else if($user == NULL && $currentuser->isAdmin())
	include('includes/templates/adminProfile.php');
else
	include('includes/templates/otherProfile.php');