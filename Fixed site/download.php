<?php
require_once("includes/databaseStart.php");
require_once('includes/requireAuthenticated.php');
require_once('includes/models/user.php');

$currentuser = User::getUserByID($_SESSION['userid']);
$file = str_replace('/','',$_GET['file']);
$filepath = "uploads/".$currentuser->getUsername()."/".$file;

if(file_exists($filepath)){
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filepath));
	readfile($filepath);
	exit;
} else {
	header('Location: files.php');
	exit;
}