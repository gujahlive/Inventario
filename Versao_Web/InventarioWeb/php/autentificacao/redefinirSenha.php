<?php
    require_once "../utils/imports.php";
    require_once "../../classes/Usuario.class.php";
    require_once "../../classes/templateRecuperarEmail.php";

    $Usuario = Usuario::getInstance($conexao);

    $senha = $_POST['senha'];
    $id_usuario = $_POST['id_usuario'];
    $email = $_POST['email'];

    $Usuario->atualizarSenha($senha, $id_usuario);
    $Usuario->login($email, $senha);
