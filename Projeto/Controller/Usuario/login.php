<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/UsuarioDAO.php';

$pesquisa = $_POST['email'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$email = $_POST['email'];
$senha = $_POST['password'];
$usuarioDao = new UsuarioDAO(); //instanciando usuarioDao
$respostaConsulta = $usuarioDao->consultarUsuario($conexao, $pesquisa); //capturando resultado da consulta


if($respostaConsulta->num_rows > 0){
    //pode-se mudar a localizacao desse html
    

    $linhaConsulta = $respostaConsulta->fetch_assoc();
    if($senha == $linhaConsulta['senha']){
        header('location: ../../index2.html'); //redirecionando ao menu principal
    } 

    echo "</table><br>"  ;
}else{

    header('location: ../../index.html'); //mantem na tela de login
}



?>
