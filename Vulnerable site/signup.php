<?php
require_once('includes/views/signup.php');
require_once('includes/controllers/signup.php');

$controller = new SignupController();
$view = new SignupView($controller);
$view->output();