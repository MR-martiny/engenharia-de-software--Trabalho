<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Model/Usuario.php';
include_once '../../Persistence/UsuarioDAO.php';

$alteracao = $_POST['alteracao'];
$nomeUsuario = $_POST['unome'];
$email = $_POST['uemail'];
$senha = $_POST['usenha'];
$valorGasto = $_POST['uvalorgasto'];


$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umUsuario = new Usuario($nomeUsuario, $email, $senha, $valorGasto); //instanciando usuario

$usuarioDao = new UsuarioDAO();
$usuarioDao->alterarUsuario($umUsuario, $alteracao, $conexao);

header('location: ../../PainelUsuarios.html'); //redirecionando ao menu principal

?>