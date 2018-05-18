<?php
  require_once "../utils/imports.php";
  require_once "../../classes/Usuario.class.php";

  $Usuario = Usuario::getInstance($conexao);
  $id_usuario = $_GET['deletar'];
  $Usuario->deletar($id_usuario);
