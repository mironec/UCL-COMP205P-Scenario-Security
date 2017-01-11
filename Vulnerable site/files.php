<?php
require_once("includes/databaseStart.php");
require_once('includes/requireAuthenticated.php');
require_once('includes/models/user.php');

$currentuser = User::getUserByID($_SESSION['userid']);
$dirpath = "uploads/".$currentuser->getUsername()."/";
if(!file_exists($dirpath)){
	mkdir($dirpath);
}

$uploadStatus = "";

if(isset($_POST['submit']) && isset($_FILES['uploadedFile'])){
	$filepath = $dirpath.basename($_FILES['uploadedFile']['name']);
	if(move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $filepath)){
		$uploadStatus = "The file ". basename( $_FILES['uploadedFile']['name']). " has been uploaded.";
	} else {
        $uploadStatus = "Sorry, there was an error uploading your file.";
    }
}

include('includes/templates/files.php');