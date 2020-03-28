<?php

class Home{

	function index()
	{		
		$title = 'Login!';		
		View::render('login', compact('title'));
	}
	
}

?>