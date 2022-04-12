<?php

include_once '../Persistence/Conexao.php';
include_once '../Model/Usuario.php';
include_once '../Persistence/UsuarioDAO.php';

$nomeUsuario = $_POST['unome'];
$email = $_POST['uemail'];
$senha = $_POST['usenha'];


$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umUsuario = new Usuario($nomeUsuario, $email, $senha); //instanciando usuario

$usuarioDao = new UsuarioDAO();
$usuarioDao->salvarUsuario($umUsuario, $conexao);
echo "chegou aqui";

header('location: ../index.html'); //redirecionando ao menu principal

?>
