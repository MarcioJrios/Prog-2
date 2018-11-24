<aside class="col-3">
	<h2>Mais pedidos</h2>
	<!-- container de mais pedidos -->
	<div class="lista-produtos">
	<?php
	include_once "includes/conexao.php";
	include_once "includes/functions.php";
	$sql = "select codp, count(*) as ocorrencias from compra where produto.plataforma = 0, group by codp order by ocorrencias desc limit 3;"; 	// busca os 3 mais pedidos
	$resultado = mysqli_query($conexao, $sql);
	while($lista = mysqli_fetch_array($resultado)){		
		// busca os detalhes de cada um dos 3 mais pedidos
		$sql = "select id, nome, imagem, preco, datalan, promocao from produto where codp = {$lista['codp']}";
		$res = mysqli_query($conexao, $sql);
		$produto = mysqli_fetch_array($res);	
		?>
			<div class="produto">
				<a href="produto.php?codp=<?=$produto['codp'];?>">
					<figure>
						<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" alt="<?=$produto['nome'];?>">
						<figcaption><?=$produto['nome'];?>
						<?=$produto['datalan']?>
						<span class="preco">
							<?=mostraPreco($produto['preco'], $produto['promocao']);?>			
						</span>
						</figcaption>
					</figure>
				</a>
			</div>  
<?php
}
?>
	</div>
</aside>