<?php

class Conexao extends PDO{
    
    //Atributos
    private $dns;
    private $user;
    private $pass;

    //Construtor
    function __construct() {
        $this->dns = "mysql:host=localhost;dbname=lojasa";
        $this->user = "root";
        $this->pass = "";

        parent::__construct($this->dns, $this->user, $this->pass);

    }

}

?>