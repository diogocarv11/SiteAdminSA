<?php

//verificar se session está iniciada
session_start();

if (!isset($_SESSION["enderecoemail"])){
    header('Location: logintest.php');
    exit();
}

require("checksession.php");

// Incluir a classe Carro
include_once "Cliente.php";

    //verifica se o parametro "action" tem o valor "apagar"
    if (isset($_GET["idCliente"])){

        $Cliente = new Cliente();
        $Cliente->setidCliente($_GET["idCliente"]);
        $ClienteEditar = $Cliente->getById()[0];
    }

//Identificar que o botão foi clicado
if (isset($_POST["btnGravarEdicao"])){

    $idCliente = $_POST["txtIdCliente"];
    $NomeCliente = $_POST["txtNomeCliente"];
    $NIFCliente = $_POST["nrNIFCliente"];
    $TelemovelCliente = $_POST["nrTelemovelCliente"];
    $EmailCliente = $_POST["txtEmailCliente"];
    $Morada = $_POST["txtMorada"];
    $Localidade = $_POST["txtLocalidade"];
    $CodigoPostal = $_POST["nrCodigoPostal"];
    
    // Criar objecto
    $Cliente = new Cliente();
    $Cliente->setIdCliente($idCliente);
    $Cliente->setNomeCliente($NomeCliente);
    $Cliente->setNIFCliente($NIFCliente);
    $Cliente->setTelemovelCliente($TelemovelCliente);
    $Cliente->setEmailCliente($EmailCliente);
    $Cliente->setMorada($Morada);
    $Cliente->setLocalidade($Localidade);
    $Cliente->setCodigoPostal($CodigoPostal);

    // Executar o comportamento
    $Cliente->gravar();

    header("Location: tableCliente.php");
}
//carregar dados na bd
if (isset($_GET["idCliente"])){

    $Cliente = new Cliente();
    $Cliente->setidCliente($_GET["idCliente"]);
    $ClienteEditar = $Cliente->getById()[0];

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
                        <h1 class="mt-4">Editar Cliente</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="tableCliente.php">Clientes</a></li>
                            <li class="breadcrumb-item active">Editar Cliente</li>
                        </ol>
                        <br>      
                    </div>

                    <!-- codigo para editar/eliminar produtos -->
                    <!--falta ligar a bd-->
                    <form method="POST">

                        <input class="form-control" name="txtIdCliente" value="<?php echo $ClienteEditar["idCliente"]; ?>" type="hidden"/>

                        <div class="card-body">
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                  </svg>
                                Dados do Cliente
                            </div>
                            
                            <div class="form-floating mb-0">

                                <input class="form-control" id="inputNomeCliente" name="txtNomeCliente" value="<?php echo $ClienteEditar["NomeCliente"]; ?>" type="text" placeholder="NomeCliente" required/>
                                <label for="inputNomeCliente">Nome</label>
                                <br>

                            </div>

                            <div class="form-floating mb-0">

                                <input class="form-control" id="inputNIFCliente" name="nrNIFCliente" value="<?php echo $ClienteEditar["NIFCliente"]; ?>" type="text" placeholder="NIFCliente" width="35%" required/>
                                <label for="inputNIFCliente">NIF</label>
                                <br>

                            </div>

                            <div class="form-floating mb-0">

                                <input class="form-control" id="inputNrTelemovelCliente" name="nrTelemovelCliente" value="<?php echo $ClienteEditar["TelemovelCliente"]; ?>" type="text" placeholder="TelemóvelCliente" required/>
                                <label for="inputNrTelemovelCliente">Telemóvel</label>
                                <br>

                            </div>

                            <div class="form-floating mb-0">
                                
                                <input class="form-control" id="inputEmailCliente" name="txtEmailCliente" value="<?php echo $ClienteEditar["EmailCliente"]; ?>" type="email" placeholder="Email" required/>
                                <label for="inputEmailCliente">Email</label>
                                <br>

                            </div>

                            <div class="form-floating mb-0">
                                
                                <input class="form-control" id="inputMorada" name="txtMorada" value="<?php echo $ClienteEditar["Morada"]; ?>" type="text" placeholder="Morada" required/>
                                <label for="inputMorada">Morada</label>
                                <br>

                            </div>

                            <div class="form-floating mb-0">
                                
                                <input class="form-control" id="inputLocalidade" name="txtLocalidade" value="<?php echo $ClienteEditar["Localidade"]; ?>" type="text" placeholder="Localidade" required/>
                                <label for="inputLocalidade">Localidade</label>
                                <br>

                            </div>

                            <div class="form-floating mb-0">
                                
                                <input class="form-control" id="inputCodigoPostal" name="nrCodigoPostal" value="<?php echo $ClienteEditar["CodigoPostal"]; ?>" type="text" placeholder="CodigoPostal" required/>
                                <label for="inputCodigoPostal">Código Postal</label>
                                <br>

                            </div>
                            <input class="btn btn-primary" type="submit" name="btnGravarEdicao" value ="Gravar" style="float: right;" />
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
