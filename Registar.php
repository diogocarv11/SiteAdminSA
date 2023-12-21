<?php

// Incluir a classe Utilizadores
include_once "Utilizadores.php";


//Identificar que o botão foi clicado
if (isset($_POST["btnRegistar"])){

    $NomeUser = $_POST["txtNomeUser"];
    $EmailUser = $_POST["txtEmailUser"];
    $TelemovelUser = $_POST["nrTelemovelUser"];
    $PasswordUser = $_POST["txtPasswordUser"];

    // Criar objecto
    $User = new User();
    $User->setNomeUser($NomeUser);
    $User->setEmailUser($EmailUser);
    $User->setTelemovelUser($TelemovelUser);
    $User->setPasswordUser($PasswordUser);
 
    // Executar o comportamento
    $User->registar();

    header("Location: logintest.php");
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registar</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNomeUser" name="txtNomeUser" type="text" placeholder=" " />
                                                <label for="inputNome">Nome</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmailUser" name="txtEmailUser" type="email" placeholder=" " />
                                                <label for="inputEmail">Endereço Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPasswordUser" name="txtPasswordUser" type="password" placeholder=" " />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputTelemóvelUser" name="nrTelemovelUser" type="text" placeholder=" " />
                                                <label for="inputTelemóvel">Telemóvel</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" type="submit" value="Registar" name="btnRegistar" href="logintest.php">
                                                <!--Direciona para o registo-->
                                                <div class="small"><a href="logintest.php">Se já tem registo faça login!</a></div>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div class="sa-login-img">
                <img src="img/SaLogo.png" alt="SardinhaAssadaLogo">
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Promo Fiestas 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
