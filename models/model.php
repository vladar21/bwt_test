<?php
class Model{
	public static function getConnection(){
		// устанавливаем связь с базой данных
		$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
		
		$db = new pdo($dsn, DB_USER, DB_PASS); 
		
		return $db;

	}

	static function clearWeatherDay(){
		$db = self::getConnection();
		$s=$db->prepare('TRUNCATE TABLE weatherday');
		$s->execute();
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

	static function saveWeatherHours($row){
		echo "<pre>".print_r($row, true)."</pre>";
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