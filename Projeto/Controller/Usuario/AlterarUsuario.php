<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/UsuarioDAO.php';

$alteracao = $_POST['alteracao'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$usuarioDao = new UsuarioDAO(); //instanciando usuarioDao
$respostaConsulta = $usuarioDao->consultarUsuario($conexao, $alteracao); //capturando resultado da consulta

if($respostaConsulta->num_rows == 1){
    $usuario = $respostaConsulta->fetch_assoc();

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
            <form action='ConclusaoAlteracao.php' method='POST'>
                <input type='text' name='alteracao' hidden value='" . $alteracao . "'>
                Nome de Usuário <input type='text' name='unome' value='" . $usuario['nome']. "' max='30'><br><br>
                E-mail <input type='email' name='uemail' value='" . $usuario['email']. "' max='30'><br><br>
                Senha <input type='password' name='usenha' value='" . $usuario['senha']. "' max='30'><br><br>
                Valor Gasto <input type='number' step=0.01 min=0 name='uvalorgasto' value='" . $usuario['valorGasto'] . "' ><br><br>
                <input type='submit' value='Enviar'>'
            </form>
        </body>
    </html>";
}else{
    header('location: ../../PainelUsuarios.html');
}


?>
