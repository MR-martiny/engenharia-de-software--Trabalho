<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/JogoDAO.php';

$alteracao = $_POST['alteracao'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$jogoDao = new JogoDAO(); //instanciando usuarioDao
$respostaConsulta = $jogoDao->consultarJogo($conexao, $alteracao); //capturando resultado da consulta

if($respostaConsulta->num_rows== 1){
    $jogo = $respostaConsulta->fetch_assoc();

    echo 
    "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://kit.fontawesome.com/1ab94d0eba.js' crossorigin='anonymous'></script>
            <title>MMO - Pesquisar</title>
            <link rel='stylesheet' href='../../View/Estilos/style.css'>
        </head>
        <body>
            <form action='ConclusaoAlteracaoJogo.php' method='POST'>
                <input type='text' name='alteracao' hidden value='" . $alteracao . "'>
                Nome <input type='text' name='jnome' value='" . $jogo['nomeJogo']. "' ><br><br>
                Descricao<input type='text' name='jdescricao' value='" . $jogo['descricao']. "' ><br><br>
                Valor Jogo <input type='number' step=0.01 name='jvalor' value='" . $jogo['valorJogo']. "'><br><br>
                <input type='submit' value='Enviar'>
            </form>
        </body>
    </html>";
}else{

    header('location: ../../PainelControleJogo.html');
}


?>
