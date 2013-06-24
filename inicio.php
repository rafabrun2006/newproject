<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Lanchonete The King</title>
		<!-- CSS -->
		<link href="public/css/style.css" rel="stylesheet" type="text/css">
		
		<!-- Fontes -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold,bolditalic" type="text/css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" type="text/css" />
        
		<!-- jQuery library -->
		<script type="text/javascript" src="public/scripts/jquery-1.6.2.min.js"></script>

		<!-- Slider -->
		<link rel="stylesheet" href="public/css/nivo-slider.css" type="text/css" media="screen">
		<link rel="stylesheet" href="public/css/nivo-theme.css" type="text/css" media="screen">
		<script src="public/scripts/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script src="public/scripts/nivo-options.js" type="text/javascript"></script>
	
	</head>
	
    <body >
		<div id="top-line"></div>
		<div id="header-wrapper"></div>
		<div id="content">
			<!--começo do cabeçalho-->
  			<div id="menu-wrapper">
    			<div id="main-menu">
      				<ul>
					   <li><a href="index.php?page=home" class="homecurrent"><span>Principal</span></a></li>
					   <li><a href="index.php" class="login"><span>Login</span></a></li>
					</ul>
    			</div>
    			<a href="#top-spacer"><div id="logo"></div></a>
  			</div>
  			<!--fim do cabeçalho-->
			<div id="principal">
			<?php
						ini_set("display_errors",0);
						switch ($_REQUEST["page"])
						{
							case "principal":
								include "home.php";
								break;
							case "login":
								include "login.php";
								break;
							default:
							include "home.php";
						}		
             		 ?>
		</div>
	</body>
</html>
