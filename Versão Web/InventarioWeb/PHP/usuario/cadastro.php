<?php
require_once "../utils/imports.php";
require_once "../../classes/Usuario.class.php";
require_once "../../classes/Cliente.class.php";
require_once "../../classes/Endereco.class.php";

$Usuario = Usuario::getInstance($conexao);


$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = password_hash($senha, PASSWORD_DEFAULT);
$tipo_usuario = 'administrador';

if(empty($_POST['id_usuario'])){
  $id_usuario = $Usuario->cadastro($email, $senha, $tipo_usuario);
} else {
  $id_usuario = $_POST['id_usuario'];
  $Usuario->atualizar($id_usuario, $email, $senha);
}

header("location: ../../paginas/usuario/home.php");
