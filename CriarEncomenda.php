<?php

//verificar se session está iniciada
session_start();

if (!isset($_SESSION["enderecoemail"])){
    header('Location: logintest.php');
    exit();
}

require("checksession.php");

// Incluir a classe Encomenda
include_once "Encomenda.php";
include_once "Cliente.php";
include_once "Produto.php";
    

//Identificar que o botão foi clicado
if (isset($_POST["btnGravar"])){
    
    $idProduto = $_POST["IdProduto"];
    $idCliente = $_POST["IdCliente"];
    $ValorFinal = $_POST["ValorFinal"];
    $Estado = $_POST["Estado"];
    $Data = $_POST["Data"];

    // Criar objecto
    $Encomenda = new Encomenda();
    $Encomenda->setIdProduto($idProduto);
    $Encomenda->setIdCliente($idCliente);
    $Encomenda->setValorFinal($ValorFinal);
    $Encomenda->setEstado($Estado);
    $Encomenda->setData($Data);


    //check if has value
    //####nao acabado####//####nao acabado####//####nao acabado####
    //####nao acabado####//####nao acabado####//####nao acabado####

    //if($idCliente=="-99"){
        //$varErrorCliente = "Escolha um cliente";
        //echo $varErrorCliente;
    //}

    //if($idProduto=="-99"){
        //$varErrorProduto = "Escolha um produto";
        //echo $varErrorProduto;
    //}

    //if(empty($Estado)){
        //echo 'Escolha um estado.';
    //}

    // Executar o comportamento
    $Encomenda->criar();

    header("Location: tableEncomenda.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SardinhaAssadaAdmin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">Sardinha Assada</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <img src="img/SaLogo.png" alt="SardinhaAssadaLogo">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="tableUtilizadores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                                Utilizadores
                            </a>

                            <a class="nav-link" href="tableCliente.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                                Clientes
                            </a>

                            <a class="nav-link" href="tableEncomenda.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                                Encomendas
                            </a>

                            <a class="nav-link" href="tableProduto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                                Produtos
                            </a>

                            <a class="nav-link" href="tableNews.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                                Novidades e Notícias
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small" name="logged_in_as">Login como:</div>
                        <?php

                            echo $_SESSION['enderecoemail'];

                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Criar nova encomenda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="tableEncomenda.php">Encomendas</a></li>
                            <li class="breadcrumb-item active">Criar nova encomenda</li>
                        </ol>
                        <br>      
                    </div>

                    <!--LIGACAO ao codigo de cima linhas 41-54 ###FALTA ACABAR###--> 
                    <!--<div class="alert alert-danger" role="alert">
                        <?php 
                            $varErrorCliente
                        ?>
                    </div>-->

                    <!-- codigo para criar encomendas -->
                    <form method="POST">
                        <div class="card-body">
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                Dados da Encomenda
                            </div>
                            <div class="form-floating mb-3">
                                                            
                                <select class="form-select" id="inputidCliente" name="IdCliente" type="text" placeholder="idCliente" required>
                                    <option value="-99">--Escolhe um Cliente--</option>
                                    <?php
                                        $cliente = new Cliente();
                                        $Clientes = $cliente->listar();
                                        foreach($Clientes as $Cliente) { 
                                    ?>
                                        <option value="<?php echo $Cliente['idCliente']; ?>"><?php echo $Cliente['NomeCliente']; ?></option>
                                    <?php } ?>

                                </select><br>

                            </div>
                            <div class="form-floating mb-3">

                                <select class="form-select" id="inputidProduto" name="IdProduto" type="text" placeholder="idProduto" required>
                                <option value="-99">--Escolhe um Produto--</option>

                                    <?php
                                    $produto = new Produto();
                                    $Produtos = $produto->listar();
                                    foreach($Produtos as $Produto) { 
                                    ?>
                                        <option value="<?php echo $Produto['idProduto']; ?>"><?php echo $Produto['NomeProduto']; ?></option>
                                    <?php } ?>

                                </select><br>

                            </div>
                            <div class="form-floating mb-3">
                                                            
                                <input class="form-control" id="inputValorFinal" name="ValorFinal" type="text" placeholder="ValorFinal" required/>
                                <label for="inputValorFinal">Valor Final</label>
                                <br>

                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="inputEstado" name="Estado" type="text" placeholder="Estado da encomenda" required>
                                    <option selected disabled value="">Estado</option>
                                    <option value="Paga">Paga (encomenda e pagamento recebidos com sucesso)</option>
                                    <option value="Em Tratamento">Em Tratamento (Início do tratamento digital da encomenda)</option>
                                    <option value="Disponível para Levantamento">Disponível para Levantamento (encomenda pronta)</option>
                                    <option value="Finalizada">Finalizada (encomenda foi finalizada. já podes deixar o seu feedback/opinião)</option>
                                    <option value="Pendente">Pendente (recebemos a tua encomenda mas ainda estará pendente o pagamento)</option>
                                    <option value="Aguarda">Aguarda (por favor verifica o teu email. aguardamos o teu contacto)</option>
                                    <option value="Recusada">Recusada (por favor contacta o teu banco para saber o motivo específico)</option>
                                    <option value="Cancelada">Cancelada (por favor contacta-nos para mais informações)</option>
                                    <option value="Abandonada">Abandonada (não completaste a tua encomenda)</option>
                                </select><br>
                            </div>
                            <div class="form-floating mb-3">
                                                            
                                <input class="form-control" id="inputData" name="Data" type="datetime-local" placeholder="Data" required/>
                                <label for="inputData">Data</label>
                                <br>

                            </div>

                            <input class="btn btn-primary" type="submit" name="btnGravar" value ="Gravar" style="float: right;" />
                        </div>
                    </form>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PromoFiestas Website 2021</div>
                            <div>
                                <a href="#">Políticas de Privacidade</a>
                                &middot;
                                <a href="#">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
