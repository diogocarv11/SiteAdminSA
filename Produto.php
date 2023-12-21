<?php

// Incluir class
include_once "Conexao.php";

class Produto implements JsonSerializable {

    // Atributos
    private string $idProduto;
    private string $NomeProduto;
    private string $Preco;
    private string $Imagem;
    private string $Descricao;

    // Acessores e Modificadores
    public function setIdProduto($value){
        $this->idProduto = $value;
    }

    public function getIdProduto(){
        return $this->idProduto;
    }
    
    public function setNomeProduto($value){
        $this->NomeProduto = $value;
    }

    public function getNomeProduto(){
        return $this->NomeProduto;
    }

    public function setPreco($value){
        $this->Preco = $value;
    }

    public function getPreco(){
        return $this->Preco;
    }

    public function setImagem($value){
        $this->Imagem = $value;
    }

    public function getImagem(){
        return $this->Imagem;
    }

    public function setDescricao($value){
        $this->Descricao = $value;
    }

    public function getDescricao(){
        return $this->Descricao;
    }

    // Comportamentos

    public function registar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para registar o produto
        $sql = "INSERT INTO Produto(NomeProduto, Preco, Imagem, Descricao) VALUES ('" . $this->NomeProduto . "', '" . $this->Preco . "', '" . $this->Imagem . "', '" . $this->Descricao . "')";

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

        //instrucao sql para registar produto
        $sql = "DELETE FROM Produto WHERE idProduto = " . $this->idProduto;

        //executar instrucoes sql na bd
        $conexao ->exec($sql);
    }
    
    public function listar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM Produto";

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $Produto = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $Produto;

    }

    public function getByid(){
    
        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM Produto WHERE idProduto =" . $this->idProduto;

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $Produto = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $Produto;
    
    }

    public function criar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para registar o produto
        $sql = "INSERT INTO Produto(NomeProduto, Preco, Imagem, Descricao) VALUES ('" . $this->NomeProduto . "', '" . $this->Preco . "', '" . $this->Imagem . "', '" . $this->Descricao . "')";

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function gravar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para atualizar o produto
        $sql = "UPDATE Produto SET NomeProduto = '" . $this->NomeProduto . "', Preco = '" . $this->Preco . "', Imagem = '" . $this->Imagem . "', Descricao = '" . $this->Descricao . "' WHERE idProduto =" . $this->idProduto;

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function jsonSerialize(){

        return [
            'idProduto' => $this->$idProduto,
            'NomeProduto' => $this->$NomeProduto,
            'Preco' => $this->$Preco,
            'Imagem' => $this->$Imagem,
            'Descricao' => $this->$Descricao
        ];

    }

}

?>