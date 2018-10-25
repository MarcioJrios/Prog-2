<?php
  include "includes/conexao.php";
  $loginV = $_POST["loginLog"];
  $sql = "select login from cliente where login = '$loginV';";
  $resultado = mysqli_query($conexao, $sql);
  if(mysqli_num_rows($resultado) != 0){
    $senhaV = $_POST['senhaLog'];
    $senhaV = md5($senhaV);
    $sql = "select senha, nome from cliente where login = '$loginV';";
    $resultado = mysqli_query($conexao, $sql);
    $teste = mysqli_fetch_array($resultado);
    if($teste["senha"] == $senhaV){
      session_start(); // abre uma nova sessao
      $_SESSION["login"] = $_POST["login"]; // armazena login na sessao

      $_SESSION["nome"] = $teste["nome"]; // armazena nome na sessao
      header("Location: index.php");
    }else{
      header("Location: login.php?erro=2");
    }
  }else{
    header("Location: login.php?erro=1");
  }
?>
