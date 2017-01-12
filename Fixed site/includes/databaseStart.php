<?php
require_once('includes/settings.php');

global $db;
$db = new PDO(DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true));