<?php
    // Incluir class
    include_once "../Conexao.php";
    include_once "../Produto.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header('Content-type: application/json');
    
    //Executar Listar de Produto.php

    $Produto = new Produto();
    $Produtos = $Produto->listar();

    print(json_encode($Produtos));

?>