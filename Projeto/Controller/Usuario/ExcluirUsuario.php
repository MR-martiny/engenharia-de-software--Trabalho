<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/UsuarioDAO.php';

$exclusao = $_POST['exclusao'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$usuarioDao = new UsuarioDAO(); //instanciando usuarioDao
$usuarioDao->excluirUsuario($conexao, $exclusao); //capturando resultado da consulta

header('location:../../PainelUsuarios.html'); //redirecionando ao menu principal

?>
