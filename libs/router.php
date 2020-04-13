<?php

class Router{
	public static function run(){
		echo "GET['url'] ".print_r($_SERVER, true)."</pre>";
		//$url = isset($_GET['url'])?$_GET['url']:'home';
		$url = $_SERVER['REQUEST_URI'];
		echo "<br>URL ".$url;
		$url = explode('/', $url);	
		//echo "<pre>".print_r($url, true)."</pre>";
		$url1 = strlen($url[1])?$url[1]:'home';	
		echo "url1 = ".$url1;
		//$pathController = 'controllers/'.$url[1].'.php';
		$pathController = 'controllers/'.$url1.'.php';
		if(file_exists($pathController))
		{
			require_once $pathController;// подключаем соотв. файл в папке controllers
			//$controller = new $url[1]();// создаем объект класса, для домашней страницы, это home
			$controller = new $url1();
		
			$method = isset($url[2])?$url[2]:'index';
			
			if(method_exists($controller, $method))
			{
				$controller->$method();// index()
			}
			else{echo 'Page Not Found';}
		}
		else{echo 'Page Not Found';}
			
	}

}