<?php
class LoginView {
	private $controller;
	
	public function __construct($controller){
		$this->controller = $controller;
	}
	
	public function output(){
		//Change GET to POST to fix vulnerability
		include('includes/templates/login.php');
	}
}