<?php
  require_once "../utils/imports.php";

  Usuario::getInstance(Conexao::getInstance())->sair();
