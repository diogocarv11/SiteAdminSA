<?php

// Incluir class
include_once "Conexao.php";

class Cliente implements JsonSerializable {

    // Atributos
    private string $idCliente;
    private string $NIFCliente;
    private string $NomeCliente;
    private string $TelemovelCliente;
    private string $EmailCliente;
    private string $Morada;
    private string $Localidade;
    private string $CodigoPostal;

    // Acessores e Modificadores
    public function setIdCliente($value){
        $this->idCliente = $value;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    
    public function setNIFCliente($value){
        $this->NIFCliente = $value;
    }
    public function getNIFCliente(){
        return $this->NIFCliente;
    }

    public function setNomeCliente($value){
        $this->NomeCliente = $value;
    }
    public function getNomeCliente(){
        return $this->NomeCliente;
    }

    public function setTelemovelCliente($value){
        $this->TelemovelCliente = $value;
    }
    public function getTelemovelCliente(){
        return $this->TelemovelCliente;
    }

    public function setEmailCliente($value){
        $this->EmailCliente = $value;
    }
    public function getEmailCliente(){
        return $this->EmailCliente;
    }

    public function setMorada($value){
        $this->Morada = $value;
    }
    public function getMorada(){
        return $this->Morada;
    }

    public function setLocalidade($value){
        $this->Localidade = $value;
    }
    public function getLocalidade(){
        return $this->Localidade;
    }

    public function setCodigoPostal($value){
        $this->CodigoPostal = $value;
    }
    public function getCodigoPostal(){
        return $this->CodigoPostal;
    }

    // Comportamentos

    public function registar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para registar o cliente
        $sql = "INSERT INTO Cliente(NIFCliente, NomeCliente, TelemovelCliente, EmailCliente, Morada, Localidade, CodigoPostal) VALUES ('" . $this->NIFCliente . "', '" . $this->NomeCliente . "', '" . $this->TelemovelCliente . "', '" . $this->EmailCliente . "', '" . $this->Morada . "', '" . $this->Localidade . "', '" . $this->CodigoPostal . "')";

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
        
        //exemplo utilizacao try catch
        try {
            //Executar instrução SQL na base de dados
            $conexao->exec($sql);

            echo "Cliente adicionado com sucesso";
        } catch (\Throwable $th) {
            echo "ocorreu um erro ao adicionar o cliente na base de dados";
        }

    }

    public function apagar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        //instrucao sql para registar cliente
        $sql = "DELETE FROM Cliente WHERE idCliente = " . $this->idCliente;

        //executar instrucoes sql na bd
        $conexao ->exec($sql);
    }
    
    public function listar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM Cliente";

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $clientes = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $clientes;

    }

    public function getById(){
    
        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM Cliente WHERE idCliente =" . $this->idCliente;

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $cliente = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $cliente;
    
    }

    public function criar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para atualizar o cliente
        //$sql = "UPDATE Cliente SET NIF = '" . $this->NIF . "', NomeCliente = '" . $this->NomeCliente . "', Telemovel = '" . $this->Telemovel . "', EmailCliente = '" . $this->EmailCliente . "' WHERE idCliente =" . $this->idCliente;
        
        // Instrução SQL para registar o cliente
        $sql = "INSERT INTO Cliente(NIFCliente, NomeCliente, TelemovelCliente, EmailCliente, Morada, Localidade, CodigoPostal) VALUES ('" . $this->NIFCliente . "', '" . $this->NomeCliente . "', '" . $this->TelemovelCliente . "', '" . $this->EmailCliente . "', '" . $this->Morada . "', '" . $this->Localidade . "', '" . $this->CodigoPostal . "')";

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function gravar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para atualizar o cliente
        $sql = "UPDATE Cliente SET NIFCliente = '" . $this->NIFCliente . "', NomeCliente = '" . $this->NomeCliente . "', TelemovelCliente = '" . $this->TelemovelCliente . "', EmailCliente = '" . $this->EmailCliente . "', Morada = '" . $this->Morada . "', Localidade = '" . $this->Localidade . "', CodigoPostal = '" . $this->CodigoPostal . "' WHERE idCliente =" . $this->idCliente;
        echo $sql;
        // Instrução SQL para registar o cliente
        //$sql = "INSERT INTO Cliente(NIF, NomeCliente, Telemovel, EmailCliente) VALUES ('" . $this->NIF . "', '" . $this->NomeCliente . "', '" . $this->Telemovel . "', '" . $this->EmailCliente . "')";

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }


    public function jsonSerialize(){

        return [
            'idCliente' => $this->$idCliente,
            'NIFCliente' => $this->$NIFCliente,
            'NomeCliente' => $this->$NomeCliente,
            'TelemovelCliente' => $this->$TelemovelCliente,
            'EmailCliente' => $this->$EmailCliente,
            'Morada' => $this->$Morada,
            'Localidade' => $this->$Localidade,
            'CodigoPostal' => $this->$CodigoPostal
        ];
        
    }

}

?>