<?php

class SolicitacaoDAO{
    function __construct(){ }

    function salvarSolicitacao($conexao, $solicitacao){

        $sql = "INSERT INTO solicitacao(desenvolvedor, nome, descricao, valor, data, email) VALUES ('" .
        $solicitacao->getDesenvolvedor() . "', '" . 
        $solicitacao->getNome(). "', '" . 
        $solicitacao->getDescricao(). "', '".
        $solicitacao->getValor(). "', '".
        $solicitacao->getData(). "', '".
        $solicitacao->getEmail(). "');";
        

        if( $conexao->query($sql) == TRUE){
            echo "Cliente salvo. ";
        }
        else{
            "Erro no cadastro: <br>";
        }    
    
    }

}
