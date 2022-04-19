<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Model/Jogo.php';
include_once '../../Persistence/JogoDAO.php';

$alteracao = $_POST['alteracao'];
$nomeJogo = $_POST['jnome'];
$descricao = $_POST['jdescricao'];
$valor = $_POST['jvalor'];

$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umJogo = new Jogo($nomeJogo, $descricao, $valor); //instanciando usuario

$jogoDao = new JogoDAO();
$jogoDao->alterarJogo($umJogo, $alteracao, $conexao);

header('location: ../../PainelControleJogo.html'); //redirecionando ao menu principal

?>