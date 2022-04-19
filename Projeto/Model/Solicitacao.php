<?php

class Solicitacao{

    private $desenvolvedor;
    private $nome;
    private $descricao;
    private $valor;
    private $data;
    private $email;
 
    function __construct($vDesenvolvedor, $vNome ,$vDescricao,$vValor, $vData, $vEmail){
        $this->desenvolvedor = $vDesenvolvedor;
        $this->nome =  $vNome;
        $this->descricao = $vDescricao;
        $this->valor = $vValor;
        $this->data = $vData;
        $this->email = $vEmail;        
    }

    function getDesenvolvedor(){
        return $this->desenvolvedor;
    }

    function getNome(){
        return $this->nome;
    }

    function getDescricao(){
        return $this->descricao;
    }

    function getValor(){
        return $this->valor;
    }

    function getData(){
        return $this->data;
    }

    function getEmail(){
        return $this->email;
    }

}


?>