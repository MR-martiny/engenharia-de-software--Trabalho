<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/SolicitacaoDAO.php';

$exclusao = $_POST['exclusao'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$solicitacaoDao = new SolicitacaoDAO(); //instanciando usuarioDao
$solicitacaoDao->excluirSolicitacao($conexao, $exclusao); //capturando resultado da consulta

header('location:../../index2.html'); //redirecionando ao menu principal

?>
