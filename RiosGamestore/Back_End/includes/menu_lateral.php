		<section class="col-1">
			<section class="menu-categorias">
				<h2>Categorias</h2>
				<nav>
					<ul>
						<!--<li><a href="acaoaventura.html">Ação/aventura</a></li>
						<li><a href="esportes.html">Esportes</a></li>
						<li><a href="rpg.html">RPG</a></li>
						<li><a href="arcade.html">Arcade</a></li>
						<li><a href="shooter.html">Shooter</a></li>
						<li><a href="estrategia.html">Estratégia</a></li>-->
						<?php
						include "includes/categorias.php";
						include "includes/conexao.php";
						foreach ($CATEGORIAS as $indice => $nomeCategoria){
							echo "<li><a href='index.php?secao=$indice'>$nomeCategoria</a></li>";
						}
						?>
					</ul>
				</nav>
			</section>
		</section>