<?php
class Model{
	public static function getConnection(){
		// устанавливаем связь с базой данных
		$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
		
		$db = new pdo($dsn, DB_USER, DB_PASS); 
		
		return $db;

	}
}


?>