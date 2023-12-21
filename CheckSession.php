<?php

//verificar se session está iniciada
session_start();

if (!isset($_SESSION["enderecoemail"])){
    header('Location: logintest.php');
    exit();
}

?>