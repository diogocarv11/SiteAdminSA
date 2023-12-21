<?php

//verificar se session está iniciada
session_start();

if (!isset($_SESSION["enderecoemail"])){
    header('Location: logintest.php');
    exit();
}

require("checksession.php");

// Incluir a classe Produto
include_once "Produto.php";
    

//Identificar que o botão foi clicado
if (isset($_POST["btnGravar"])){
    
    $NomeProduto = $_POST["txtNomeProduto"];
    $Preco = $_POST["Preco"];
    //$Imagem = $_POST["ImagemProduto"];
    $Descricao = $_POST["txtDescricao"];

    
    //Stores the filename as it was on the client computer.
    $imagename = "produto-" . random_int(0, 999999999999999) . $_FILES['ImagemProduto']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['ImagemProduto']['type'];
    //Stores any error codes from the upload.
    $image_error = $_FILES['ImagemProduto']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['ImagemProduto']['tmp_name'];
    //The path you wish to upload the image to
    $imagePath = "img-produtos/";

    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
          echo "sucesso";
        }
        else {
          echo "Erro ao mover a imagem.<br>";
        }
    }
    else {
      echo "failed";
    }

    

    // Criar objecto
    $Produto = new Produto();
    $Produto->setNomeProduto($NomeProduto);
    $Produto->setPreco($Preco);
    $Produto->setImagem($imagename);
    $Produto->setDescricao($Descricao);

    // Executar o comportamento
    $Produto->criar();

    header("Location: tableProduto.php");
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
                        <h1 class="mt-4">Criar novo produto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="tableProduto.php">Produto</a></li>
                            <li class="breadcrumb-item active">Criar novo produto</li>
                        </ol>
                        <br>      
                    </div>

                    <!-- codigo para criar produtos -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="card-header">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11.5 23l-8.5-4.535v-3.953l5.4 3.122 3.1-3.406v8.772zm1-.001v-8.806l3.162 3.343 5.338-2.958v3.887l-8.5 4.534zm-10.339-10.125l-2.161-1.244 3-3.302-3-2.823 8.718-4.505 3.215 2.385 3.325-2.385 8.742 4.561-2.995 2.771 2.995 3.443-2.242 1.241v-.001l-5.903 3.27-3.348-3.541 7.416-3.962-7.922-4.372-7.923 4.372 7.422 3.937v.024l-3.297 3.622-5.203-3.008-.16-.092-.679-.393v.002z"/>
                            </svg>
                                Dados do Produto
                            </div>
                            <div class="form-floating mb-3">

                                <input class="form-control" id="inputNomeProduto" name="txtNomeProduto" type="text" placeholder="Nome" required/>
                                <label for="inputNomeProduto">Nome</label>
                                <br>

                            </div>
                            <div class="form-floating mb-3">

                                <input class="form-control" id="inputPreco" name="Preco" type="text" placeholder="Preco" required/>
                                <label for="inputPreco">Preço</label>
                                <br>

                            </div>
                            <div class="form-floating mb-3">
                                                            
                                <input class="form-control" id="inputDescricao" name="txtDescricao" type="text" placeholder="Descricao" required/>
                                <label for="inputDescricao">Descrição</label>
                                <br>

                            </div>
                            <div class="mb-3">

                                <label for="formFile" class="form-label">Escolha a imagem do produto</label>
                                <input class="form-control form-control" name="ImagemProduto" id="formFile" type="file" style="padding: 16px 12px;" required>
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
        <script src="js/datatables-custom.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
