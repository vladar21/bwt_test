<?php 
class View{
	public static function render($path, $data)// передаем путь и данные из контроллера
	{
		
		extract($data); // разбиваем ассоциативный массив на переменные, название переменных по названию ключа
		
		include 'views/header.php';
		include 'views/'.$path.'.php';// передаем путь к файлу, который должен у нас выводиться
		include 'views/footer.php';

	}
}

