<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Model/Usuario.php';
include_once '../../Persistence/UsuarioDAO.php';

$nomeUsuario = $_POST['unome'];
$email = $_POST['uemail'];
$senha = $_POST['usenha'];


$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umUsuario = new Usuario($nomeUsuario, $email, $senha, 0); //instanciando usuario

$usuarioDao = new UsuarioDAO();
$usuarioDao->salvarUsuario($conexao, $umUsuario);
echo "chegou aqui";

header('location: ../../PainelUsuarios.html'); //redirecionando ao menu principal

?>