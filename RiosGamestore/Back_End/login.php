<?php
$erros=array();
	# se o botao de cadastro foi clicado
	if(isset($_POST['cadastrar'])){
		$nome = trim(addslashes($_POST['nome']));
		$email = trim(addslashes($_POST['email']));
		$numcartao = trim(addslashes($_POST['numcartao']));
		$csenha1 = trim(addslashes($_POST['csenha']));
		$csenha2 = trim(addslashes($_POST['csenha2']));
		$concordo = isset($_POST['concordo']) ? 1 : 0;

		// Validações
		if (empty($nome) || !strstr($nome," "))
			$erros[] = "Digite seu nome completo";

		if(empty($email) || !(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
           $erros[] = "Digite um email válido";	

		if(strlen($senha1) != 12)
			$erros[] = "Digite um numero de cartão válido";

		if(strlen($senha1) < 6)
			$erros[] = "A senha deve ter no mínimo 6 caracteres";
		else{
			if($senha1 != $senha2)
				$erros[] = "As senhas não conferem";
		}

		if(!($concordo))
			$erros[] = "Você deve concordar com os termos do site";

		// inserção
		if(count($erros) == 0){
			include_once "includes/conexao.php";
			$nova = md5($senha1);	
			$sql="INSERT INTO cliente (email, nome, numcartao, csenha) VALUES ('$email', '$nome', '$numcartao',
			'$nova')";
			mysqli_query($conexao, $sql);
		}
	}
?>

<?php
include "includes/cabecalho.php";
?>

	<div class="container">
		<div id="form1">
			<h2>Crie uma Conta</h2>
			<?php 
			// caso houver, exibe os erros
			if(isset($erros) and count($erros) > 0){
				echo "<ul>";
				foreach ($erros as $erro) {
				echo "<li style='color:red'>$erro</li>";
			}
			echo "</ul>";
		}
		?>
		<?php 
		// Caso não tenha nenhum erro e esteja clicado o exibirá a mensagem de sucesso
		if(!(isset($_POST['cadastrar'])) || count($erros)!=0){
		?>
			<form action="" method="post" id="form-contato">
				    <div class="form-item">
				      <label for="nome" class="label-alinhado">Nome Completo:</label>
				      <input type="text" id="nome" name="nome" size="50" placeholder="Nome completo" value="<?=isset($nome) ? $nome : '';?>">
				      <span class="msg-erro" id="msg-nome"></span>
				    </div>
				    <div class="form-item">
				      <label for="email" class="label-alinhado">E-mail:</label>
				      <input type="email" id="email" name="email" placeholder="name@example" size="50" value="<?=isset($email) ? $email : '';?>">
				      <span class="msg-erro" id="msg-email"></span>
				    </div>	
				    <div class="form-item">
				      <label for="numcartao" class="label-alinhado">Senha:</label>
				      <input type="password" id="numcartao" name="numcartao" placeholder="Digite o número de seu cartão">
				      <span class="msg-erro" id="msg-senha"></span>
				    </div>			    			    
				    <div class="form-item">
				      <label for="csenha" class="label-alinhado">Senha:</label>
				      <input type="password" id="csenha" name="csenha" placeholder="Mínimo 6 caracteres">
				      <span class="msg-erro" id="msg-senha"></span>
				    </div>
				    <div class="form-item">
				      <label for="csenha2" class="label-alinhado">Repita a Senha:</label>
				      <input type="password" id="csenha2" name="csenha2" placeholder="Mínimo 6 caracteres">
				      <span class="msg-erro" id="msg-senha2"></span>
				    </div>
				    <div class="form-item">
				      <label class="label-alinhado"></label>
				      <label><input type="checkbox" id="concordo" name="concordo" <?=isset($concordo) ? ($concordo ? 'checked' : '') : '';?>> Li e estou de acordo com os termos de uso do site</label>
				      <span class="msg-erro" id="msg-concordo"></span>
				    </div>				    
				    <div class="form-item">
				    	<label class="label-alinhado"></label>
				    	<input type="submit" id="botao" value="Confirmar" name="cadastrar">
				    </div>
				</form>
		</div>

		<div id="form2">
			<h2>Logue com sua Conta</h2>
			<form action="verificacao.php" method="post" id="form-contato2">
				<div class="form-item">
				    <label for="login" class="label-alinhado">E-mail:</label>
				    <input type="email" id="login" name="login" placeholder="name@example" size="50">
				    <span class="msg-erro" id="msg-email3"></span>
				</div>				    			    
				<div class="form-item">
				    <label for="senha3" class="label-alinhado">Senha:</label>
				    <input type="password" id="senha3" name="senha" placeholder="Mínimo 6 caracteres">
				    <span class="msg-erro" id="msg-senha3"></span>
				</div>
				<div class="form-item">
				    <label class="label-alinhado"></label>
				    <input type="submit" id="botao2" value="Confirmar" name="logar">
				</div>
			</form>
		</div>
	</div>

	<footer><p>Rios GameStore - Chapecó/SC</p>
		<ul class="social">
			<li><a href="http://facebook.com/rentatool"><img src="img/facebook.png" alt="Facebook"></a></li>
			<li><a href="http://twitter.com/rentatool"><img src="img/twitter.png" alt="Twitter"></a></li>
			<li><a href="http://plus.google.com/rentatool"><img src="img/googleplus.png" alt="Google+"></a></li>
		</ul>
		<div id="ajuda"><a href="perguntas">Precisa de ajuda? </a></div>
	</footer>
	<script src="js/login.js"></script>
</body>
</html>