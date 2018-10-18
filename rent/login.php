<?php
include "includes/cabecalho.php";
?>

	<!-- area central com 3 colunas -->
	<div class="container">
		<?php
		include "includes/menu_lateral.php";
		?>

		<section class="col-2">

      <div>
          <form action="verificaLogin.php" method="post" id="form-contato">
                <label for="login" class="label-alinhado">Login:</label>
                <input type="text" id="loginLog" name="login" placeholder="Mínimo 6 caracteres">
                <span class="msg-erro" id="msg-login"></span>
                </div>
              <div class="form-item">
                <label for="senha" class="label-alinhado">Senha:</label>
                <input type="password" id="senhaLog" name="senha" placeholder="Mínimo 6 caracteres">
                <span class="msg-erro" id="msg-senha"></span>
              </div>
              <div class="form-item">
                <label class="label-alinhado"></label>
                <input type="submit" id="botao" value="Entrar">
              </div>
              <div style="color: red">
                <?php
                if(isset($_GET['erro'])){
                  if($_GET['erro'] == 1)
                    echo "Login incorreto";
                  elseif($_GET['erro'] == 2)
                    echo "Senha incorreta";
                  }
                  ?>
      </div>
          </form>
          <a href="cad_cliente.php">Criar uma conta</a>
          <br>
          <a href="#">Esqueci minha senha</a>
          </div>
      ?>
		</section>
	<?php
	include "includes/mais_pedidos.php";
	?>
	</div>
	<!-- fim area central -->
<?php
include "includes/rodape.php";
?>
