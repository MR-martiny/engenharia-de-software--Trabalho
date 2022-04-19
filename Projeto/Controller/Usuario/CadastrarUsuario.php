<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Model/Usuario.php';
include_once '../../Persistence/UsuarioDAO.php';

$nomeUsuario = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];


$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umUsuario = new Usuario($nomeUsuario, $email, $senha, 0); //instanciando usuario

$usuarioDao = new UsuarioDAO();
$usuarioDao->salvarUsuario($conexao, $umUsuario);
echo "chegou aqui";

header('location: ../../index2.html'); //redirecionando ao menu principal

?>