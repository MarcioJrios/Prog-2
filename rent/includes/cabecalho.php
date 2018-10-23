<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Rent a Tool</title>
	<link rel="stylesheet" type="text/css" href="css/rent.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> <!-- web font Lobster -->
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<h1>Rent a Tool</h1>
		<div class="LogCar">
		<?php
		session_start();
		if(isset($_SESSION['nome']))
			$var = $_SESSION['nome'];
			echo "Olá $var";
			else {
				echo "<a href="login.php">login</a>";
			}
		?>
			<p class="carrinho"><a href="#">Meu carrinho <img src="img/cart.png" width="32"></a></p>
		</div>
		 
		<div class="LogCar">
			<a href="login.php"
			<p class="carrinho"><a href="#">Meu carrinho <img src="img/cart.png" width="32"></a></p>
		</div>
		<p id="exibeMenu">Menu</p>
		<nav class="menu-opcoes">
			<ul>
				<li><a href="#">Minha Conta</a></li>
				<li><a href="#">Programa de pontos</a></li>
				<li><a href="#">Consumo solidário</a></li>
				<li><a href="#">Quem somos</a></li>
				<li><a href="#">Ajuda</a></li>
			</ul>
		</nav>
	</header>
	<!-- fim cabeçalho -->
