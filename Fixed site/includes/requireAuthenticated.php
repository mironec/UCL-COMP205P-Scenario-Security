<?php
session_start();

if(!isset($_SESSION['userid'])) {
	throwOut();
}

function throwOut(){
	session_unset();
	session_destroy();
	header("Location: index.php");
	die();
}