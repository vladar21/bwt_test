<?php
require_once 'controllers/weather.php';

class Home{

	static function index()
	{		
		if(!session_id()) { session_start(); }
		$title = 'Signup!';
		//session_start();
		$email = isset($_SESSION['email'])?$_SESSION['email']:'';

		if ($email != ''){
			$message = "Вы уже зарегистрировались";
		}
		else{
			$message = "Вам необходимо зарегистрированться";
		}
		
		return View::render('signup', compact('title', 'message'));
	}

	function register(){
		Model::register($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['gender'], $_POST['date'], 1);// ДЗ-8        
		$_SESSION['email']=$_POST['email'];
		header('Location: /weather');
		exit();
	}

	function logout(){
        session_start();       
        session_destroy();      
		$title = 'Login!';		
		return View::render('login', compact('title'));
    }

	function login(){
		$title = 'Login!';		
		return View::render('login', compact('title'));
	}
	
	static function log() {
		
		$email = isset($_POST['email'])?$_POST['email']:'';
       
		if($email==''){
			$message = 'Введите email';
			$title = "Login!";
			return View::render('login', compact('title', 'message'));
        }
      
		$result = Model::checkEmail($email);			
		if($result) {
			session_start();
			$_SESSION['email'] = $email;
			// $is_login = 1;
			// Model::is_loginTrue($email);
			return Weather::index();
		}
		else {		               
			$message = 'Неверный email';
			$title = "Login!";
			return View::render('/login', compact('title', 'message'));
		}
            
	}
	
	static function feedback(){
		if(!session_id()) { session_start(); }		
		$email = isset($_SESSION['email'])?$_SESSION['email']:'';

		if ($email != ''){
			$expr = Model::checkIs_login($email);
		
			if($expr){
				$title = 'Feedback!';
				return view::render('feedback', compact('title'));
			}
		}
		
		//$title = 'Signup!';
		// $message = "Вам необходимо зарегестрированться";
		//return View::render('signup', compact('title', 'message'));
		//session_start();
		return Home::index();
		
		
	}

	static function comments(){
		echo "<pre> is_login = ".$is_login."</pre>";
		if($is_login){
			$title = 'Comments!';
			$comments = Model::getComments();
			//return 

			//view::render('comments', compact('title', 'feedbacks'));
		}
		else{
			$title = 'Signup!';
			$message = "Вам необходимо зарегестрированться";
			view::render('/', compact('title', 'message'));
		}
	}

        
}

?>