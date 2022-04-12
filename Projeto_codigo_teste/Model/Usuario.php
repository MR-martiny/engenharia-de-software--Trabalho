<?php

class Usuario{

    private $nomeUsuario;
    private $email;
    private $senha;
    private $valorGasto;

    function __construct($vNomeUsuario, $vEmail, $vSenha){
        $this->nomeUsuario = $vNomeUsuario;
        $this->email = $vEmail;
        $this->senha = $vSenha;
        $this->getValorGasto = 0.0;
    }

    function getNomeUsuario(){
        return $this->nomeUsuario;
    }

    function getEmail(){
        return $this->email;
    }

    function getSenha(){
        return $this->senha;
    }

    function getValorGasto(){
        return $this->valorGasto;
    }

}


?>
