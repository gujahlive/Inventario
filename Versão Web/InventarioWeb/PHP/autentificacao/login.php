<?php
    require_once "../utils/imports.php";
    require_once "../../classes/Usuario.class.php";

    $Usuario = Usuario::getInstance($conexao);

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $redirect = '';
    if(isset($_POST['redirect'])){
      $redirect = $_POST['redirect'];
    }

	  $Usuario->login($email, $senha, $redirect);
