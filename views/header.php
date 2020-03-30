<?php if(!session_id()) { session_start(); } ?>
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
  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
      <a class="navbar-brand" href="/weather">bwt_test</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <?php 
            $active = ($_SERVER['REQUEST_URI']);
            echo '<li';
            if ($active == '/weather') echo ' class="active"';
            echo '><a href="/weather">Weather</a></li>';
            echo '<li';
            if ($active == '/home/feedback') echo ' class="active"';
            echo '><a href="/home/feedback">Feadback</a></li>';   
            echo '<li';
            if ($active == '/home/comments') echo ' class="active"';
            echo '><a href="/home/comments">Comments</a></li>';       
            
        ?>       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
          
        <?php if(!isset($_SESSION['email'])): ?>
          <li><?php isset($_SESSION['email'])?$_SESSION['email']:''; ?></li>
          <li><a href="/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="/home/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

        <?php else: ?>
          <li><a href="/home/logout">Hi, <?= $_SESSION['email'] ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>