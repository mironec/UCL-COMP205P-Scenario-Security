<?php
session_start();

if(!isset($_SESSION['username'])) {
	throwOut();
}

function throwOut(){
	session_destroy();
	header("Location: index.php");
	die();
}