<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/UsuarioDAO.php';

$pesquisa = $_POST['pesquisa'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$usuarioDao = new UsuarioDAO(); //instanciando usuarioDao
$respostaConsulta = $usuarioDao->consultarUsuario($conexao, $pesquisa); //capturando resultado da consulta

echo "<html> 
        <head>
            <meta charset='utf-8'>
            <meta name='viewport content='width=device-width, initial-scale=1.0'>
            <script src='https://kit.fontawesome.com/1ab94d0eba.js' crossorigin='anonymous'></script>
            <title>MMO - Pesquisar</title>
            <link rel='stylesheet' href='../../View/Estilos/tabelaEstilo.css'>      
        </head>  
           ";
    

if($respostaConsulta->num_rows > 0){
    //pode-se mudar a localizacao desse html
    
    echo "<body><table>
            <tr>
                <th> Nome </th> 
                <th> Email </th>
                <th> Valor Gasto </th> 
            </tr>
        ";

    while($linhaConsulta = $respostaConsulta->fetch_assoc() ){ //transferindo cada linha da consulta pra variavel linhaConsulta
        echo "<tr>";

        echo "<td>" . $linhaConsulta['nome'] . "</td>" . 
             "<td>" . $linhaConsulta['email'] . "</td>".
             "<td>R$" . $linhaConsulta['valorGasto'] . "</td>";
        
        echo "</tr>";
    }

    echo "</table><br>"  ;
}else{

    echo "<h1>Nenhum usuario cadastrado</h1><br>";
}

echo "<a href='../../PainelUsuarios.html'> Retornar ao menu </a>     
        </body></html>"


?>
