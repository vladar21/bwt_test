<?php

class Weather{

	static function index(){
		if(!session_id()) { session_start(); }
		
		$email = isset($_SESSION['email'])?$_SESSION['email']:'';
		if ($email != ''){
			$is_login = Model::checkIs_login($email);
		
			if($is_login){
				$url = 'http://www.gismeteo.ua/city/daily/5093/';        
				$forecast = [];
				$header = [];
				// парсинг ресурса
				libxml_use_internal_errors(true);
				$doc = new DOMDocument();                
				$doc->loadHTMLFile($url);
	
				$xpath = new DOMXpath($doc);   
	
				$result = $xpath->query('.//*/div[@class="subnav_search_city js_citytitle"]');
				if ($result){
					$header['city'] = $result[0]->nodeValue;			
				}
				
				$result = $xpath->query('.//div[@class="chart chart__temperatureTab"]/div/div[1]/span[1]');
				if ($result){
					$header['min_temperature'] = trim($result[0]->nodeValue);
				}
				
				$result = $xpath->query('.//div[@class="chart chart__temperatureTab"]/div/div[2]/span[1]');
				if ($result){
					$header['max_temperature'] = trim($result[0]->nodeValue);
				}
	
				$header['current_date'] = date("Y-m-d");
				Model::clearWeatherDay();
				Model::saveWeatherDay($header);
	
				$hours = [];
				$result = $xpath->query('/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[1]/div');
				foreach($result as $r){			
					array_push($hours, $r->firstChild->firstChild->nodeValue);
				}
	
				$clouds = [];
				$result = $xpath->query('/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[2]/div');		
				foreach($result as $r){
					array_push($clouds, $r->firstChild->firstChild->getAttribute('data-text'));
				}
	
				$temperatures = [];
				$result = $xpath->query('/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[3]/div/div/div/div');		
				foreach($result as $r){
					array_push($temperatures, $r->firstChild->nodeValue);
				}
	
				$winds = [];
				$result = $xpath->query('/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[5]/div/div/div/span[1]');
				foreach($result as $r){
					array_push($winds, trim($r->nodeValue));
				}
				
				$precipitaion = [];
				Model::clearWeatherHours();
				$weatherid = Model::getIdWeatherDay($header['city']);		
				if ($weatherid){
					for($i=0; $i<8; $i++){
						$row = [];
						$row[0] = $weatherid;
						$row[1] = $temperatures[$i]?$temperatures[$i]:'нет данных';
						$row[2] = $clouds[$i]?$clouds[$i]:'нет данных';
						$row[3] = $hours[$i]?$hours[$i]:'нет данных';
						$row[4] = $winds[$i]?$winds[$i]:'нет данных';
						$row[5] = isset($precipitaion[$i])?$precipitaion[$i]:'нет данных';
						
						Model::saveWeatherHours($row);
					}
				}
				else {
					echo "Error! Don't find city";
				}

				$title = 'Weather!';
				$weatherday = Model::getWeatherDay();
				$weatherhours = Model::getWeatherHours();
			
	
				view::render('weather', compact('title', 'weatherday', 'weatherhours'));
				
			}
		}		
	
		$title = 'Signup!';
		$message = "Вам необходимо зарегестрированться";
		return View::render('signup', compact('title', 'message'));		
		
	}
	
}

?>