<?php
    require_once "../utils/imports.php";
    require_once "../../classes/Usuario.class.php";
    require_once "../../classes/templateRecuperarEmail.php";

    $Usuario = Usuario::getInstance($conexao);

    $email = $_POST['email'];

    $dados = $Usuario->buscarEmail($email);

    if(!empty($dados)){
      $html = gerarTemplate($dados->id_usuario);
      $assunto = 'Recuperação de senha';
      $Usuario->enviarEmail($email, $html, $assunto);
      header("location: ../../paginas/autentificacao/enviarToken.php?status=true");
    }
