<?php

include_once '../Persistence/Conexao.php';
include_once '../Persistence/UsuarioDAO.php';

$pesquisa = $_POST['pesquisa'];

$conexao = new Conexao(); //instanciando conexao com banco de dados
$conexao = $conexao->getConexao();      

$usuarioDao = new UsuarioDAO(); //instanciando usuarioDao
$respostaConsulta = $usuarioDao->consultarUsuario($conexao, $pesquisa); //capturando resultado da consulta

if($respostaConsulta->num_rows > 0){
    //pode-se mudar a localizacao desse html
    echo "<html> 
            <style>
               table{
                font-family: arial;
                background-color: rgb(138, 85, 226);
                width: 100%;
                border-collapse: collapse;
               }
               
               td, td{
                text-align: center;
                border: 1px solid #000;    
               }

            </style>    
           ";
    
    echo "<table>
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

    echo "</table> </body> </html>";
}

echo "<html>
        <a href='../index.html' > Retornar ao menu </a>     
    </html>"


?>
