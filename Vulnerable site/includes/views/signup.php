<?php
class SignupView {
	private $controller;
	
	public function __construct($controller){
		$this->controller = $controller;
	}
	
	public function output(){
		include('includes/templates/signup.php');
	}
}