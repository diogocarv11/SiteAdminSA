<?php 

//verificar se session está iniciada
require("checksession.php");

if (!isset($_SESSION["enderecoemail"])){
    header('Location: logintest.php');
    exit();
}

// Incluir class
include_once "Encomenda.php";

//Verifica se parametro "action" em GET esta definido
if (isset($_GET["action"])){
    //verifica se o parametro "action" tem o valor "apagar"
    if ($_GET["action"] == "apagar"){

        $Encomenda = new Encomenda();
        $Encomenda->setIdEncomenda($_GET["idEncomenda"]);

        $Encomenda->apagar();

        header("location: tableEncomenda.php");
    }
}

$Encomenda = new Encomenda();
$Encomendas = $Encomenda->listar();

//var_dump($Encomendas);

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
                        <h1 class="mt-4">Encomendas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tabela Encomendas</li>
                        </ol>
                        <div class="btn-newEncomenda">
                            <a class="btn btn-primary" href="CriarEncomenda.php" role="button">Criar nova encomenda</a>
                        </div>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabela Encomendas
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>idEncomenda</th>
                                            <th>idCliente</th>
                                            <th>idProduto</th>
                                            <th>ValorFinal</th>
                                            <th>Estado</th>
                                            <th>Data</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>idEncomenda</th>
                                            <th>idCliente</th>
                                            <th>idProduto</th>
                                            <th>ValorFinal</th>
                                            <th>Estado</th>
                                            <th>Data</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($Encomendas as $Encomenda) { ?>
            
                                        <tr>
                                            <td><?php echo $Encomenda["idEncomenda"]; ?></td>
                                            <td><?php echo $Encomenda["idCliente"]; ?></td>
                                            <td><?php echo $Encomenda["idProduto"]; ?></td>
                                            <td><?php echo $Encomenda["ValorFinal"]; ?></td>
                                            <td><?php echo $Encomenda["Estado"]; ?></td>
                                            <td><?php echo $Encomenda["Data"]; ?></td>

                                            <td>
                                                <a href="EditarEncomenda.php?idEncomenda=<?php echo $Encomenda["idEncomenda"]; ?>">
                                                    Editar
                                                </a>
                                            </td>
                                            <td>
                                                <a href="tableEncomenda.php?action=apagar&idEncomenda=<?php echo $Encomenda["idEncomenda"]; ?>">
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>      
                    </div>
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
        <script src="js/datatables-custom.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
