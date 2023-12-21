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
    <?php 

session_start();

include_once "utilizadores.php";

$loginError = false;

//Verificar se a variável existe no POST
if (isset($_POST["btnLogin"])){
    $EmailUser = $_POST["inputEmail"];
    $PasswordUser = $_POST["inputPassword"];

    $user = new User();
    $user->setEmailUser($EmailUser);
    $user->setPasswordUser($PasswordUser);

    $login = $user->verificaLogin();

    //echo $login[0]["EmailUser"];

    if ($login == true){
      $_SESSION['enderecoemail'] = $login[0]["EmailUser"];
      

      header('Location: index.php');
    } else {
        $loginError = true;
    }
  }

?>

<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <?php if($loginError == true) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Endereço email ou password incorretos!
                                                </div>
                                            <?php } ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder=" " />
                                                <label for="inputEmail">Endereço Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPasswordUser" name="inputPassword" type="password" placeholder=" " />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Lembrar Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Esqueceu-se da Password?</a>
                                                <input type="submit" class="btn btn-primary" name="btnLogin" value="Login"></a>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Direciona para o registo-->
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="Registar.php">Ainda não tem conta? Sign up!</a></div>
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
            <!--<div id="layoutAuthentication_footer">
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
            </div>-->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

    
</html>
