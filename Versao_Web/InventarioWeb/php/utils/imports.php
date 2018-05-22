<?php
    // Includes necessarios para o funcionamento do sistema
    header("Content-type: text/html; charset=utf-8");
  	require_once "../../conexao/Conexao.class.php";
    require_once "../../classes/Usuario.class.php";

    $conexao = Conexao::getInstance();
