<?php
//session_start();

if(!isset($_COOKIE['userid'])) {
	throwOut();
}

function throwOut(){
	//session_destroy();
	setcookie('userid', '-1', time() - 3600, "/");
	header("Location: index.php");
	die();
}