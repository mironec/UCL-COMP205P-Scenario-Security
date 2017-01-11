<?php
require_once('includes/settings.php');

class Database {
	private static $instance = NULL;
	private function __construct(){}
	private function __clone(){}
	
	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new PDO(DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
		}
		
		return self::$instance;
	}
}