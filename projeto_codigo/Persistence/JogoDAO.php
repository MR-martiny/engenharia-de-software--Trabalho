<?php

class JogoDAO{
    function __construct(){ }

    function salvarJogo($conexao, $jogo){

        $sql = "INSERT INTO jogo(nomeJogo, descricao, valorJogo) VALUES ('" .
        $jogo->getNomeJogo() . "', '" . 
        $jogo->getDescricao(). "', '" . 
        $jogo->getvalorJogo(). "');";

        if( $conexao->query($sql) == TRUE){
            echo "Cliente salvo. ";
        }
        else{
            "Erro no cadastro: <br>";
        }    
    }

    function consultarjogo($conexao, $pesquisa){
        if( $pesquisa == null){ //se nao for fornecido nenhum dado de pesquisa
            
            $sql = "SELECT id, nomeJogo, descricao, valorJogo FROM jogo;";
            $resposta = $conexao->query($sql);
            return $resposta;

        } else { //o dado de pesquisa pode ser tanto um email quanto como um nome de jogo

            $sql = "SELECT id, nomeJogo, descricao, valorJogo FROM jogo WHERE " . 
                    " nomeJogo='" . $pesquisa . "' OR id='" . $pesquisa . "';"; 
            
            $resposta = $conexao->query($sql);
            return $resposta;        
        }            
    }

    function excluirjogo($conexao, $exclusao){
        if ( $exclusao != null){
            $sql = "DELETE FROM jogo WHERE " . 
                    " nomeJogo='" . $exclusao . "' OR id='" . $exclusao . "';";
            
            $conexao->query($sql);
        }
    }

    function alterarJogo($umjogo, $alteracao, $conexao){
        $sql = "UPDATE jogo SET " .
            "nomeJogo = '" . $umjogo->getNomejogo() . "', " . 
            "descricao = '" . $umjogo->getDescricao(). "', " . 
            "valorJogo = '" . $umjogo->getValorJogo(). "' WHERE " .
            
            "nomeJogo = '" . $alteracao . "' OR id='" . $alteracao . "';" ;
            
            $resposta = $conexao->query($sql);
        
        $conexao->query($sql);
    }

}