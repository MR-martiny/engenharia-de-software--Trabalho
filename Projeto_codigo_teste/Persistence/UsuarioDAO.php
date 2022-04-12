<?php

class UsuarioDAO{
    function __construct(){ }

    function salvarUsuario($usuario, $conexao){

        $sql = "INSERT INTO usuario(nome, email, senha) VALUES ('" .
        $usuario->getNomeUsuario() . "', '" . 
        $usuario->getEmail(). "', '" . 
        $usuario->getSenha(). "');";

        if( $conexao->query($sql) == TRUE){
            echo "Cliente salvo. ";
        }
        else{
            "Erro no cadastro: <br>";
        }    
    }

    function consultarUsuario($conexao, $pesquisa){
        if( $pesquisa == null){ //se nao for fornecido nenhum dado de pesquisa
            
            $sql = "SELECT nome, email, senha, valorGasto FROM usuario;";
            $resposta = $conexao->query($sql);
            return $resposta;

        } else { //o dado de pesquisa pode ser tanto um email quanto como um nome de usuario

            $sql = "SELECT nome, email, senha, valorGasto FROM usuario WHERE " . 
                    " nome='" . $pesquisa . "' OR email='" . $pesquisa . "';"; 
            
            $resposta = $conexao->query($sql);
            return $resposta;        
        }            
    }

}