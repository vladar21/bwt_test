<?php

class Home{

	function index()
	{		
		$title = 'Weather!';		
		View::render('main', compact('title'));
	}

	function weather(){
		
	}

	
}

?>