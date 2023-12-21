<?php

// Incluir class
include_once "Conexao.php";

class News implements JsonSerializable {

    // Atributos
    private string $idNews;
    private string $LinkNews;
    private string $ImagemNews;
    private string $DescricaoNews;

    // Acessores e Modificadores
    public function setIdNews($value){
        $this->idNews = $value;
    }
    public function getIdNews(){
        return $this->idNews;
    }

    public function setLinkNews($value){
        $this->LinkNews = $value;
    }
    public function getLinkNews(){
        return $this->LinkNews;
    }

    public function setImagemNews($value){
        $this->ImagemNews = $value;
    }
    public function getImagemNews(){
        return $this->ImagemNews;
    }

    public function setDescricaoNews($value){
        $this->DescricaoNews = $value;
    }
    public function getDescricaoNews(){
        return $this->DescricaoNews;
    }

    // Comportamentos

    public function registar(){

        //Conectar à base de dados
        $conexao = new Conexao();

        // Instrução SQL para registar o News
        $sql = "INSERT INTO news(LinkNews, ImagemNews, DescricaoNews) VALUES ('" . $this->LinkNews . "', '" . $this->ImagemNews . "', '" . $this->DescricaoNews . "')";

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

        //instrucao sql para registar News
        $sql = "DELETE FROM news WHERE idNews = " . $this->idNews;

        //executar instrucoes sql na bd
        $conexao ->exec($sql);
    }
    
    public function listar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM news";

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $News = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $News;

    }

    public function getByid(){
    
        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para selecionar dados da bd
        $sql = "SELECT * FROM news WHERE idNews =" . $this->idNews;

        // Preparar instrução 
        $query = $conexao->query($sql);

        // Executar a query e gravar resultados
        $News = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados
        return $News;
    
    }

    public function criar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para registar o News
        $sql = "INSERT INTO News(LinkNews, ImagemNews, DescricaoNews) VALUES ('" . $this->LinkNews . "', '" . $this->ImagemNews . "', '" . $this->DescricaoNews . "')";

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function gravar(){

        //Conectar à base de dados
        $conexao = new Conexao();


        // Instrução SQL para atualizar o News
        $sql = "UPDATE News SET LinkNews = '" . $this->LinkNews . "', ImagemNews = '" . $this->ImagemNews . "', DescricaoNews = '" . $this->DescricaoNews . "' WHERE idNews =" . $this->idNews;

        //mostrar dados da base de dados
        //echo $sql

        //Executar instrução SQL na base de dados
        $conexao->exec($sql);
    }

    public function jsonSerialize(){

        return [
            'idNews' => $this->$idNews,
            'LinkNews' => $this->$LinkNews,
            'ImagemNews' => $this->$ImagemNews,
            'DescricaoNews' => $this->$DescricaoNews
        ];

    }

}

?>