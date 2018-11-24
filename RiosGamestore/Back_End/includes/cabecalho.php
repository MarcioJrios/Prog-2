<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Rios GameStore</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link href="https://fonts.googleapis.com/css?family=Notable" rel="stylesheet"> 
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<div id="sup">
			<?php
			if(isset($_SESSION["login"]) && isset($_SESSION["nome"])){
				$variavel = "Olá, ";
				$variavel.= $_SESSION["nome"] ;
				$variavel.="! <a href=\"sair.php\">(Sair)</a>";
			}else{
				$variavel = "<a href=\"login.php\">Login</a>";
			}
			 ?>
			<p class="carrinho"><?=$variavel?> &nbsp;&nbsp;&nbsp;&nbsp;<a href="carrinho.php">Meu carrinho 
			<span id="numItensCarrinho">
			<?php 
			     if(isset($_SESSION['carrinho']))
			         echo "(".count($_SESSION['carrinho']).")";
			?>
			<img src="img/cart.png" width="32"></a></p>

			<label for="busca">Procurar:</label>
			<input type="search" placeholder="Busca..." name="busca" id="busca"
					value="<?=isset($_GET['busca']) ? $_GET['busca'] : '';?>">>
		</div>
		<div id="dTitulo">
		<h1><a href="index.php">Rios GameStore</a></h1>
		</div>
		<!--<p id="Menu">Menu</p>-->
		<nav class="menu-opcoes">
			<ul>
				<li><a href="index.php">Início</a></li>
				<li><a href="index.php?opt=1">Promoções</a></li>
				<li><a href="index.php?opt=2">Sony</a></li>
				<li><a href="index.php?opt=3">Microsoft</a></li>
				<li><a href="perguntas.php">Perguntas Frequentes</a></li>
			</ul>
		</nav>
	</header>
	<!-- fim cabeçalho -->
