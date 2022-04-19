<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Model/Solicitacao.php';
include_once '../../Persistence/SolicitacaoDAO.php';

$desenvolvedor = $_POST['sdev'];
$nome = $_POST['sjogo'];
$descricao = $_POST['sdescricao'];
$valor = $_POST['svalor'];
$data = $_POST['sdata'];
$email = $_POST['semail'];


$conexao = new Conexao(); //instanciando conexao
$conexao = $conexao->getConexao();     

$umaSoliticao = new Solicitacao($desenvolvedor, $nome, $descricao, $valor, $data, $email); //instanciando jogo

$solicitacao = new SolicitacaoDAO();
$solicitacao->salvarSolicitacao($conexao, $umaSoliticao);
echo "chegou aqui";

header('location: ../../PainelControleJogo.html'); //redirecionando ao menu principal

?>
