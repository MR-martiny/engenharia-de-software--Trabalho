<?php

include_once '../../Persistence/Conexao.php';
include_once '../../Persistence/JogoDAO.php';

$pesquisa = $_POST['pesquisa'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$jogoDao = new JogoDAO(); //instanciando usuarioDao
$respostaConsulta = $jogoDao->consultarJogo($conexao, $pesquisa); //capturando resultado da consulta

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
                <th> ID </th> 
                <th> Nome </th>
                <th> Descricao </th>
                <th> Valor </th>
                <th colspan='2'><input type='button' value='Pesquisar' onclick=\"location.href='../../View/Jogo/ConsultarJogo.html'\"></th>
            </tr>
        ";

    while($linhaConsulta = $respostaConsulta->fetch_assoc() ){ //transferindo cada linha da consulta pra variavel linhaConsulta
        echo "<tr>";

        echo "<td>" . $linhaConsulta['id'] . "</td>" . 
             "<td>" . $linhaConsulta['nomeJogo'] . "</td>".
             "<td>" . $linhaConsulta['descricao'] . "</td>".
             "<td>R$" . $linhaConsulta['valorJogo'] . "</td>" .
             
             "<td><form action='ExcluirJogo.php' method='POST' autocomplete='off'>
                    <input type='text' name='exclusao' value='" . $linhaConsulta['id'] . "' hidden>
                    <input type='submit' value='Excluir'></form>
              </td>
              <td><form action='AlterarJogo.php' method='POST' autocomplete='off'>
                    <input type='text' name='alteracao' value='" . $linhaConsulta['id'] . "' hidden>
                    <input type='submit' value='Editar'></form>
              </td>";       

        
        echo "</tr>";
    }

    echo "</table><br>"  ;

}else{

    echo "<h1>Nenhum jogo cadastrado</h1><br>";
}

echo "<a href='../../PainelControleJogo.html'> Retornar ao menu </a>     
        </body></html>"


?>
