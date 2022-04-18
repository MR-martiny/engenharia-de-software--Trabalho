<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Model/Jogo.php';
include_once '../../Persistence/JogoDAO.php';

$nomeJogo = $_POST['jnome'];
$descricaoJogo = $_POST['jdescricao'];
$valorJogo = $_POST['jvalor'];


$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umJogo = new Jogo($nomeJogo, $descricaoJogo, $valorJogo); //instanciando jogo

$jogoDao = new JogoDAO();
$jogoDao->salvarJogo($conexao, $umJogo);
echo "chegou aqui";

header('location: ../../PainelControleJogo.html'); //redirecionando ao menu principal

?>