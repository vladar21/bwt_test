<?php

class Router{
	public static function run(){
		
		$url = isset($_GET['url'])?$_GET['url']:'home';
		$url = explode('/', $url);		
		
		$pathController = 'controllers/'.$url[0].'.php';
		
		if(file_exists($pathController))
		{
			require_once $pathController;// подключаем соотв. файл в папке controllers
			$controller = new $url[0]();// создаем объект класса, для домашней страницы, это home
			//var_dump($controller);
			$method = isset($url[1])?$url[1]:'index';
			
			if(method_exists($controller, $method))
			{
				$controller->$method();// index()
			}
			else{echo 'Page Not Found';}
		}
		else{echo 'Page Not Found';}
			
	}

}