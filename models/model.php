<?php
class Model{
	static function getConnection(){
		// устанавливаем связь с базой данных
		$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';		
		$db = new pdo($dsn, DB_USER, DB_PASS); 		
		return $db;

	}
	static function getComments(){
		$db = self::getConnection();
		$s = $db->prepare('SELECT * FROM feedback');					
		$s->execute();
		
		return $s->fetchall();
	}

	static function saveComment($email, $name, $message){
		$db = self::getConnection();
		$s = $db->prepare(
			'INSERT INTO feedback (name, email, message) VALUES(:name, :email, :message)');
			$s->bindParam(':name', $name);
			$s->bindParam(':email', $email);		
			$s->bindParam(':message', $message);
			$s->execute();
	}

	static function checkIs_login($email){
		$db = self::getConnection();
		$s = $db->prepare('SELECT 1 FROM user WHERE email = :email LIMIT 1');
		$s->bindParam(':email', $email);
		$s->execute();

		return $s->fetch(PDO::FETCH_NUM);
	}

	static function checkEmail($email){
		$db = self::getConnection();
		$s = $db->prepare('SELECT 1 FROM user WHERE email = :email LIMIT 1');
		$s->bindParam(':email', $email);
		$s->execute();
		
		return $s->fetch(PDO::FETCH_NUM);
	}

	static function register($fname, $lname, $email, $gender, $birthday){
		$db = self::getConnection();
		$s = $db->prepare('INSERT INTO user (first_name, last_name, email, gender, birthday) 
		VALUES (:first_name, :last_name, :email, :gender, :birthday)');
		$s->bindParam(':first_name', $fname);
		$s->bindParam(':last_name', $lname);
		$s->bindParam(':email', $email);
		$s->bindParam(':gender', $gender);
		$s->bindParam(':birthday', $birthday);
		$s->execute();
	} 

	static function clearWeatherDay(){
		$db = self::getConnection();
		$s=$db->prepare('TRUNCATE TABLE weatherday');
		$s->execute();
	}

	static function getWeatherDay(){
		$db = self::getConnection();
		$s = $db->prepare('SELECT * FROM weatherday');					
		$s->execute();

		return $s->fetch(PDO::FETCH_ASSOC);
	}

	static function saveWeatherDay($header){
		$db = self::getConnection();
		$s = $db->prepare(
			'INSERT INTO weatherday (date, max_temperature, min_temperature, city) 
			VALUES(:date, :max_temperature, :min_temperature, :city)');
		$s->bindParam(':date', $header['current_date']);
		$s->bindParam(':max_temperature', $header['max_temperature']);
		$s->bindParam(':min_temperature', $header['min_temperature']);
		$s->bindParam(':city', $header['city']);
		$s->execute();
	}

	static function getIdWeatherDay($city){
		$db = self::getConnection();
		$s = $db->prepare('SELECT id FROM weatherday WHERE city = :city LIMIT 1');
		$s->bindParam(':city', $city);				
		$s->execute();
		
		return $s->fetchColumn();
	}

	static function clearWeatherHours(){
		$db = self::getConnection();
		$s=$db->prepare('TRUNCATE TABLE weatherhours');
		$s->execute();
	}

	static function getWeatherHours(){
		$db = self::getConnection();
		$s = $db->prepare('SELECT * FROM weatherhours');					
		$s->execute();
		
		return $s->fetchall();
	}

	static function saveWeatherHours($row){
		$db = self::getConnection();
		$s = $db->prepare('INSERT INTO weatherhours (weatherdayid, temperature, cloud, hour_index, wind_speed, precipitaion) 
		VALUES(:weatherdayid, :temperature, :cloud, :hour_index, :wind_speed, :precipitaion)');
		$s->bindParam(':weatherdayid', $row[0]);
		$s->bindParam(':temperature', $row[1]);
		$s->bindParam(':cloud', $row[2]);
		$s->bindParam(':hour_index', $row[3]);
		$s->bindParam(':wind_speed', $row[4]);
		$s->bindParam(':precipitaion', $row[5]);
		$s->execute();
	}
	
}


?>