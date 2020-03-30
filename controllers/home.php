<?php
require_once 'controllers/weather.php';

class Home{

	static function index()
	{		
		if(!session_id()) { session_start(); }
		$title = 'Signup!';
	
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

		$fname = isset($_POST['fname'])?$_POST['fname']:'';
		$lname = isset($_POST['lname'])?$_POST['lname']:'';
		$email = isset($_POST['email'])?$_POST['email']:'';
		$gender = isset($_POST['gender'])?$_POST['gender']:'';
		$birthday = isset($_POST['date'])?$_POST['date']:'';

		$message = '';
	
		if ($fname == ''){ $message .= 'Введите first name.<br>'; }			
		if ($lname == ''){ $message .= 'Введите last name.<br>'; }
		if ($email == ''){ $message .= 'Введите email.<br>'; }			
		if ($gender == ''){ $message .= 'Введите gender.<br>'; }
		if ($birthday == ''){ $message .= 'Введите birthday.'; }
		if (strlen($message) > 0) {
			$title = "Sign Up!";
			return View::render('signup', compact('title', 'message'));
		}
		$birthday = strtotime($birthday);
		$birthday = date("Y-m-d", $birthday);		
		Model::register($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['gender'], $birthday);    
		
		session_start();
		$_SESSION['email'] = $email;
		$title = 'Weather!';
		$weatherday = Model::getWeatherDay();
		$weatherhours = Model::getWeatherHours();	

		view::render('weather', compact('title', 'weatherday', 'weatherhours'));
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

			return Weather::index();
		}
		else {		               
			$message = 'Неверный email';
			$title = "Login!";
			return View::render('/login', compact('title', 'message'));
		}
            
	}
	
	static function feedback(){		
		$title = 'Feedback!';
		return view::render('feedback', compact('title'));			
	}

	static function savecomment(){
		$email = isset($_POST['email'])?$_POST['email']:'';
		$name = isset($_POST['name'])?$_POST['name']:'';
		$info = isset($_POST['message'])?$_POST['message']:'';

		$message = '';
	
		if ($email == ''){ $message .= 'Введите email.<br>'; }			
		if ($name == ''){ $message .= 'Введите имя.<br>'; }
		if ($info == ''){ $message .= 'Введите комменатрий.'; }
		if (strlen($message) > 0) {
			$title = "Feedback!";
			return View::render('feedback', compact('title', 'message'));
		}
		
		Model::saveComment($email, $name, $info);

		if(!session_id()) { session_start(); }

		$emailsession = isset($_SESSION['email'])?$_SESSION['email']:'';
		if ($emailsession != ''){	
			$expr = Model::checkIs_login($emailsession);
			if ($expr){			
				$title = "Comments!";
				$comments = Model::getComments();
				return View::render('comments', compact('title', 'comments'));
			}
		}
		return Home::index();	
	}

	static function comments(){
		if(!session_id()) { session_start(); }		
		$emailsession = isset($_SESSION['email'])?$_SESSION['email']:'';		
		
		if ($emailsession != ''){	
			
			$is_login = Model::checkIs_login($emailsession);
			
			if ($is_login){			
				$title = "Comments!";
				$comments = Model::getComments();
				return View::render('comments', compact('title', 'comments'));
			}
		}
		return Home::index();
	}

        
}

?>