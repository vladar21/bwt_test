<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Site Weather</title>
	<!-- Кодировка веб-страницы -->
  <meta charset="utf-8">
  <!-- Настройка viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Подключаем Bootstrap CSS -->
  <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" >
</head>
<body>
	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="/">bwt_test</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <?php 
            $active = ($_SERVER['REQUEST_URI']);
            echo '<li';
            if ($active == '/weather') echo ' class="active"';
            echo '><a href="/weather">Weather</a></li>';
            echo '<li';
            if ($active == '/feedback') echo ' class="active"';
            echo '><a href="/feedback">Feadback</a></li>';        
            
        ?>       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>