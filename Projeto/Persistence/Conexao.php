<?php

class Conexao{

    private $servername = "localhost";
    private $username = "root";     
    private $password = "";
    private $bd = "bd_mmo";

    private $conexaoBD = null;

    function __construct(){}

    function getConexao(){

        if( $this->conexaoBD == null){
            $this->conexaoBD = mysqli_connect($this->servername, $this->username, $this->password, $this->bd);
        }
        if( !$this->conexaoBD ){
            die("Conexao falhou: " .$conexaoBD->connect_error);
        }

        return $this->conexaoBD;
    }    

}

?>