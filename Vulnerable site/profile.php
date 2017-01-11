<?php
require_once("includes/databaseStart.php");
require_once('includes/requireAuthenticated.php');
require_once('includes/models/user.php');

$user = NULL;
if(isset($_GET['user']) && !empty($_GET['user'])){
	$user = User::getByUsername($_GET['user']);
}
$currentuser = User::getUserByID($_SESSION['userid']);

if(isset($_POST['bio']) && isset($_POST['email'])){
	$user->setBio($_POST['bio']);
	$user->setEmail($_POST['email']);
	$user->saveToDatabase();
}

if($user == NULL)
	include('includes/templates/profile.php');
else
	include('includes/templates/otherProfile.php');