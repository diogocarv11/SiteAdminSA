<?php

// Incluir class
include_once "Conexao.php";

class Encomenda implements JsonSerializable {

    // Atributos
    private $idEncomenda;
    private $idProduto;
    private $idCliente;
    private $ValorFinal;
    private $Estado;
    private $Data;

    // Acessores e Modificadores
    public function setIdEncomenda($value){
        $this->idEncomenda = $value;
    }
    public function getIdEncomenda(){
        return $this->idEncomenda;
    }
    
    public function setIdProduto($value){
        $this->idProduto = $value;
    }
    public function getIdProduto(){
        return $this->idProduto;
    }

    public function setIdCliente($value){
        $this->idCliente = $value;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setValorFinal($value){
        $this->ValorFinal = $value;
    }
    public function getValorFinal(){
        return $this->ValorFinal;
    }

    public function setEstado($value){
        $this->Estado = $value;
    }
    public function getEstado(){
        return $this->Estado;
    }

    public function setData($value){
        $this->Data = $value;
    }
    public function getData(){
        return $this->Data;
    }


    // Comportamentos

    public function registar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para registar o carro
        $sql = "INSERT INTO Encomenda(idEncomenda, idProduto,idCliente, ValorFinal, Estado, Data) VALUES ('" . $this->idEncomenda . "', '" . $this->idProduto . "', '" . $this->idCliente . "', '" . $this->ValorFinal . "', '" . $this->Estado . "', '" . $this->Data . "')";

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
        
        //exemplo utilizacao try catch
        try {
            //Executar instrução SQL na base de dados
            $conexao->exec($sql);

            echo "registo inserido com sucesso";
        } catch (\Throwable $th) {
            echo "ocorreu um erro ao inserir na base de dados";
        }

    }

    public function apagar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        //instrucao sql para registar carro
        $sql = "DELETE FROM Encomenda WHERE idEncomenda = " . $this->idEncomenda;

        //executar instrucoes sql na bd
        $conexao ->exec($sql);
    }
    
    public function listar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM Encomenda";

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $Encomenda = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $Encomenda;

    }

    public function getById(){
    
        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM Encomenda WHERE idEncomenda =" . $this->idEncomenda;

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $Encomenda = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $Encomenda;
    
    }

    public function criar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para registar o produto
        $sql = "INSERT INTO Encomenda(idProduto, idCliente, ValorFinal, Estado, Data) VALUES ('" . $this->idProduto . "', '" . $this->idCliente . "', '" . $this->ValorFinal . "', '" . $this->Estado . "', '" . $this->Data . "')";

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function gravar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para atualizar o carro
        $sql = "UPDATE Encomenda SET idEncomenda = '" . $this->idEncomenda . "', idProduto = '" . $this->idProduto . "', idCliente = '" . $this->idCliente . "', ValorFinal = '" . $this->ValorFinal . "', Estado = '" . $this->Estado . "', Data = '" . $this->Data . "' WHERE idEncomenda =" . $this->idEncomenda;

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function jsonSerialize(){

        return [
            'idEncomenda' => $this->$idEncomenda,
            'idProduto' => $this->$idProduto,
            'idCliente' => $this->$idCliente,
            'ValorFianl' => $this->$ValorFianl,
            'Estado' => $this->$Estado,
            'Data' => $this->$Data
        ];

    }

}

?>