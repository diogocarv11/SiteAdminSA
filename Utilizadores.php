<?php

// Incluir class
include_once "Conexao.php";

class User {

    // Atributos
    private string $idUser;
    private string $NomeUser;
    private string $EmailUser;
    private $TelemovelUser;
    private string $PasswordUser;
    private $Tipo = 1;


    // Acessores e Modificadores
    public function setIdUser($value){
        $this->idUser = $value;
    }
    public function getIdUser(){
        return $this->idUser;
    }

    public function setNomeUser($value){
        $this->NomeUser = $value;
    }
    public function getNomeUser(){
        return $this->NomeUser;
    }

    public function setEmailUser($value){
        $this->EmailUser = $value;
    }
    public function getEmailUser(){
        return $this->EmailUser;
    }

    public function setTelemovelUser($value){
        $this->TelemovelUser = $value;
    }
    public function getTelemovelUser(){
        return $this->TelemovelUser;
    }

    public function setPasswordUser($value){
        $this->PasswordUser = $value;
    }
    public function getPasswordUser(){
        return $this->PasswordUser;
    }

    public function setTipo($value){
        $this->Tipo = $value;
    }
    public function getTipo(){
        return $this->Tipo;
    }

    // Comportamentos

    public function registar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para registar o User
        $sql = "INSERT INTO user(NomeUser, EmailUser, PasswordUser, TelemovelUser, Tipo) VALUES ('" . $this->NomeUser . "', '" . $this->EmailUser . "', '" . $this->PasswordUser . "', '" . $this->TelemovelUser . "', '" . $this->Tipo . "')";

        try {
			//if para executar se os errors estão vazios - errors
			//Executar instrução SQL na base de dados
			$conexao->exec($sql);
			return true;
		} catch (\Throwable $th) {
			return false;
		}
    }

    public function apagar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        //instrucao sql para registar User
        $sql = "DELETE FROM user WHERE idUser = " . $this->idUser;

        //executar instrucoes sql na bd
        $conexao ->exec($sql);
    }

    public function listar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM user";

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $Users = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $Users;

    }

    public function gravar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para atualizar o user
        $sql = "UPDATE user SET NomeUser = '" . $this->NomeUser . "', TelemovelUser = '" . $this->TelemovelUser . "', EmailUser = '" . $this->EmailUser . "', Tipo = '" . $this->Tipo . "' WHERE idUser =" . $this->idUser;
        echo $sql;

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function getById(){
    
        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM user WHERE idUser =" . $this->idUser;

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $User = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $User;
    
    }

    public function verificaLogin() {
        $conexao = new Conexao();

        $sql = "Select * FROM user WHERE EmailUser = '" . $this->EmailUser . "' and PasswordUser = '" . $this->PasswordUser . "'";

        // Preparação da instrução á BD
        $query = $conexao->query($sql);
        // Execução da query na BD a gravar resultados numa varíavel
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

}

?>