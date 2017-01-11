<?php
require_once('includes/views/login.php');
require_once('includes/controllers/login.php');

$controller = new LoginController();
$view = new LoginView($controller);
$view->output();