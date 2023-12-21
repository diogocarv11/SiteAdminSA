<!--### SABER SE TEM ESTA PAGINA OU NAO ###-->
<!--### SABER SE TEM ESTA PAGINA OU NAO ###-->
<!--### SABER SE TEM ESTA PAGINA OU NAO ###-->

<?php

//verificar se session está iniciada
session_start();

if (!isset($_SESSION["enderecoemail"])){
    header('Location: logintest.php');
    exit();
}

require("checksession.php");

// Incluir a classe User
include_once "Utilizadores.php";


//Identificar que o botão foi clicado
if (isset($_POST["btnGravar"])){

    $NomeUser = $_POST["NomeUser"];
    $EmailUser = $_POST["txtEmailUser"];
    $PasswordUser = $_POST["txtPasswordUser"];
    $TelemovelUser = $_POST["nrTelemovelUser"];
    $Tipo = $_POST["Tipo"];
    

    // Criar objecto
    $User = new User();
    $User->setNomeUser($NomeUser);
    $User->setEmailUser($EmailUser);
    $User->setPasswordUser($PasswordUser);
    $User->setTelemovelUser($TelemovelUser);
    $User->setTipo($Tipo);
    

    // Executar o comportamento
    $User->registar();

    header("Location: tableUtilizadores.php");
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
                        <h1 class="mt-4">Criar novo utilizador</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="tableUtilizadores.php">Utilizadores</a></li>
                            <li class="breadcrumb-item active">Criar novo utilizador</li>
                        </ol>
                        <br>
                        
                        <!-- codigo para criar user -->
                        <form method="POST">
                            <div class="card-body">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      </svg>
                                    Dados do Utilizador
                                </div>
                                
                                <div class="form-floating mb-3">

                                    <input class="form-control" id="inputNomeUser" name="NomeUser" type="text" placeholder="NomeUser" width="35%" required/>
                                    <label for="inputNomeUser">Nome</label>
                                    <br>

                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="inputEmailUser" name="txtEmailUser" type="email" placeholder="EmailUser" required/>
                                    <label for="inputEmailUser">Email</label>
                                    <br>

                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="inputPasswordUser" name="txtPasswordUser" type="password" placeholder="PasswordUser" required/>
                                    <label for="inputPasswordUser">Password</label>
                                    <br>

                                </div>

                                <div class="form-floating mb-3">

                                    <input class="form-control" id="inputNrTelemovelUser" name="nrTelemovelUser" type="text" placeholder="TelemóvelUser" required/>
                                    <label for="inputNrTelemovelUser">Telemóvel</label>
                                    <br>

                                </div>

                                <div class="form-floating mb-3">

                                    <Select class="form-control" id="inputTipo" name="Tipo" type="text" placeholder="Tipo" required>
                                    <label for="inputTipo">Tipo</label>
                                        <option selected disabled value="">Tipo</option>
                                        <option value="1">1 - Admin</option>
                                        <option value="2">2 - Cliente</option>
                                        <br>
                                    </select>
                                </div>
                                <input class="btn btn-primary" type="submit" name="btnGravar" value ="Gravar" style="float: right;" />
                            </div>
                        </form>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
