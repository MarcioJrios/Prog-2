<?php
include "includes/cabecalho.php";
?>
<div class="container">
  <?php
  include "includes/menu_lateral.php";
  ?>
  <section class="col-2">
  <?php
  	include_once "includes/conexao.php";
    include_once "includes/functions.php";
    $sql = "select * from produto";
    if(isset($_GET['codp'])){
      $sql.= " where codp = '".$_GET['codp']."' ";
      // echo "$sql";
    }
    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) == 0){
      echo "<p>Nenhum produto encontrado</p>";
    }
    else{
      $produto = mysqli_fetch_array($resultado);
      $titulo = $produto['nome'];
      $preco =  mostraPreco($produto['preco'],$produto['promocao']);
      echo "<h2>$titulo<h2>";
      ?>

      <div class="produtos">
        <img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" alt="<?=$produto['nome'];?>">
      </div>
      <div class="teste">
        <?=$preco?>
       <div class="lista-produtos"> 
        <form action="adiciona.php" method="post" id = "quantidade">
          <label for="qtd" class="label-alinhado">Quantidade:</label>
          <input type="hidden" name="id" value="<?=$produto['id']?>">
          <input type="hidden" name="nome" value="<?=$produto['nome']?>">
          <input type="hidden" name="valorFinal" value="<?=($produto['valor'] - $produto['desconto'])?>">
          <br><br>
          <input type="submit" value="Adicionar ao Carrinho" name="adicionar">
          <br><br>
        </form>
      </div>
      </div>
      <header class="detalhes-produto">
        <?php
          $produto = mysqli_fetch_array($resultado);
          $estoque = $produto['quantidade'];
          $datalan = $produto['datalan'];
          $sql = "select descricao from categoria join (select * as S from cat_prod where $produto['codp'] = cat_prod.codp) on S.sigla = categoria.sigla";
          $categorias = mysqli_query($conexao, $sql);
          $plataforma = $produto['plataforma'];

          echo "$estoque";
          echo "$datalan";
          echo "$plataforma";
          foreach ($categorias as $lista) {
            echo "$lista&nbsp;&nbsp;  ";
          }
          echo "$categorias ";
         ?>
         <!--<?=$fabricante?>-->
      </header>
      <?php
  }
      ?>
  </section>

  <?php
  include "includes/mais_pedidos0.php";
  ?>
  <?php
  include "includes/mais_pedidos1.php";
  ?>
  </div>
<!-- fim area central -->
<?php
include "includes/rodape.php";
?>
