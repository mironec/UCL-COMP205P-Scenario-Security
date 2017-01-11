<?php
require_once("includes/databaseStart.php");
require_once('includes/requireAuthenticated.php');
require_once('includes/models/user.php');

$user = User::getUserByID($_SESSION['userid']);

if(isset($_POST['bio'])){
	$user->setBio($_POST['bio']);
	$user->saveToDatabase();
}

include('includes/templates/profile.php');