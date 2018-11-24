<?php
include "includes/cabecalho.php";
?>

	<div class="container">

		<?php
		include "includes/menu_lateral.php";
		?>	

		<section class="sec2">

			<?php
			include "includes/conexao.php";
			if(isset($_GET['secao'])){
				$categoriaSelecionada = $_GET['secao'];
				$sql = "select descricao from categoria where sigla = $categoriaSelecionada";
				$titulo = mysqli_query($conexao, $sql);
			}
			elseif(isset($_GET['busca'])){
				$titulo = "Resultado da busca por \"{$_GET['busca']}\" ";
			}
			else{
				$titulo = "Novidades";
			}
			?>
			<h2><?=$titulo;?></h2>
			
			<div class="lista-produtos">
					<!-- um produto -->
				<?php
				include_once "includes/conexao.php";
				include "includes/functions.php";
				$sql = "select codp, nome, imagem, preco, promocao from produto";
				if(isset($categoriaSelecionada))
					$sql.= " where produto.sigla = $categoriaSelecionada;";
				elseif(isset($_GET['busca']))
					$sql.=" where nome like '%{$_GET['busca']}%';";
				elseif(isset($_GET['opt'])){
					if($_GET['opt'] == 1)
						$sql.= "where promocao != NULL;";
					elseif($_GET['opt'] == 2)
						$sql.= "where plataforma = 0;";
					else
						$sql.= "where plataforma = 1;";
				}
				else
					$sql.= " order by codp desc limit 10;"; // novidades
				

				//echo $sql;

				$resultado = mysqli_query($conexao, $sql);
				if(mysqli_num_rows($resultado) == 0){
					echo "<p>Nenhum produto encontrado</p>";
				}
				else{
					while ($produto = mysqli_fetch_array($resultado)){

					?>
				<div class="produto">
					<a href="produto.php?codp=<?=$produto['codp'];?>">
						<figure>
							<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" alt="<?=$produto['nome'];?>">
							<figcaption><?=$produto['nome'];?>
								<span class="preco">
									<?=mostraPreco($produto['preco'], $produto['promocao']);?>			
								</span>
							</figcaption>
						</figure>
					</a>
				    </div> 
				    <?php						
					}
				}
				?>
		</section>

		<aside class="sec3">
			<h2>Populares Playstation 4</h2>
			<div class="lista-produtos">
				<?php
					include "includes/mais_pedidos0.php"
				?>
			</div>
		</aside>

		<aside class="sec3">
			<h2>Populares Xbox One</h2>
			<div class="lista-produtos">
				<?php
					include "includes/mais_pedidos1.php"
				?>
			</div>
		</aside>
	</div>

<?php
include "includes/rodape.php";
?>