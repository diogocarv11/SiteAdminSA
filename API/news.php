<?php
    // Incluir class
    include_once "../Conexao.php";
    include_once "../News.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header('Content-type: application/json');
    
    //Executar Listar de News.php

    $News = new News();
    $News = $News->listar();

    print(json_encode($News));

?>