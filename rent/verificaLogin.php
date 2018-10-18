<?php
  include "includes/conexao.php";
  $loginV = $_POST["login"];
  $sql = "select login from cliente where login = $loginV";
  $resultado = mysqli_query($conexao, $sql);
  if(mysqli_num_rows($resultado) != 0){
    $senhaV = $_POST['senhaLog'];
    $senhaV = md5($senhaV);
    $sql = "select senha from cliente where login = $loginV";
    $resultado = mysqli_query($conexao, $sql);
    if($senhaV == $resultado['senha']){
      session_start(); // abre uma nova sessao
      $_SESSION['login'] = $_POST['login']; // armazena login na sessao
      $sql = "select nome from cliente where login = $loginV";
      $resultado = mysqli_query($conexao, $sql);
      $_SESSION['nome'] = $resultado; // armazena horario na sessao
      header("Location: index.php");
    }else{
      header("Location: login.php?erro=2");
    }

  }else{
    header("Location: login.php?erro=1");
  }

?>
