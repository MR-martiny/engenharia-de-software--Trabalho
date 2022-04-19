<?php

class Jogo{

    private $nomeJogo;
    private $descricao;
    private $valorJogo;

    function __construct($vNomeJogo, $vDescricao, $vValorJogo){
        $this->nomeJogo = $vNomeJogo;
        $this->descricao = $vDescricao;
        $this->valorJogo = $vValorJogo;
        
    }

    function getNomeJogo(){
        return $this->nomeJogo;
    }

    function getDescricao(){
        return $this->descricao;
    }

    function getValorJogo(){
        return $this->valorJogo;
    }

}


?>