<?php
  include_once "includes/conexao.php";
  $login = $_POST["login"];
  $sql = "select email, nome, csenha, numcartao from cliente where email = '$login';";
  $resultado = mysqli_query($conexao, $sql);
  if(mysqli_num_rows($resultado) == 0){
    header("Location: login.php?erro=1");
  }else{
    $user = mysqli_fetch_array($resultado);
    $senha3 = md5($_POST["senha3"]);
    if($user["csenha"] == $senha3){
      session_start();
			$_SESSION["login"] = $login;
      $_SESSION["nome"] = $user["nome"];
      $_SESSION["id"] = $user["email"];
      $_SESSION["numcartao"] = $user["numcartao"];
			header("Location: index.php");
    }else{
      header("Location: login.php?erro=2");
    }
  }
 ?>
