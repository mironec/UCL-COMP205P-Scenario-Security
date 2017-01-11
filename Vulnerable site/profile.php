<?php
require_once('includes/requireAuthenticated.php');

if($_GET['action'] == 'logout'){
	throwOut();
}

echo 'Congratulations <a href="?action=logout">Logout</a>';