<?php
    require_once "../utils/imports.php";
    require_once "../../classes/Usuario.class.php";
    require_once "../../classes/Cliente.class.php";
    require_once "../../classes/Endereco.class.php";

    $Usuario = Usuario::getInstance($conexao);
    $Cliente = Cliente::getInstance($conexao);
    $Endereco = Endereco::getInstance($conexao);

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $redirect = $_POST['redirect'];
    $telefone_residencial = $_POST['telefone_residencial'];
    $telefone_celular = $_POST['telefone_celular'];

	  $id_usuario = $Usuario->cadastro($email, $senha, 'padrao');

    $id_cliente = $Cliente->cadastro($nome, $cpf, $telefone_residencial, $telefone_celular, $id_usuario, $redirect);

    $id_endereco = $Endereco->cadastrarEndereco($cep, $rua, $bairro, $numero, $complemento, $cidade, $estado, $latitude, $longitude);

    $Endereco->cadastrarEnderecoCliente($id_cliente, $id_endereco);

    $Usuario->login($email, $_POST['senha']);

    if($redirect == 'cadastro'){
      header("location: ../../paginas/home/home.php");
    } else {
      header("location: ../../paginas/servico/detalhes.php?servico=1&cadastro=true");
    }
