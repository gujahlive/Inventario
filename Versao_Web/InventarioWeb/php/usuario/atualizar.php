<?php
  require_once "../utils/imports.php";
  require_once "../../classes/Usuario.class.php";

  session_start();

  $Usuario = Usuario::getInstance($conexao);

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $Usuario->atualizar($email, $senha, $_SESSION['id_usuario'], $_FILES);
