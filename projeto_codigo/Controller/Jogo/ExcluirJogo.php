<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/JogoDAO.php';

$exclusao = $_POST['exclusao'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$jogoDao = new JogoDAO(); //instanciando usuarioDao
$jogoDao->excluirJogo($conexao, $exclusao); //capturando resultado da consulta

header('location: ../../PainelControleJogo.html'); //redirecionando ao menu principal

?>
