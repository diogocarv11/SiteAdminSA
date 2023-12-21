<?php

require_once 'includes/jwt_utils.php';
include_once "../utilizadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	$data = json_decode(file_get_contents("php://input", true));

	$user = new User();
	$user->setNomeUser($data->nome);
	$user->setEmailUser($data->email);
	$user->setTelemovelUser($data->telemovel);
	$user->setPasswordUser($data->password);
	$user->setTipo($data->tipo);

	$result = $user->registar();

	if($result == true) {
		echo json_encode(array('sucess' => 'Registo Certo'));
	} else {
		echo json_encode(array('error' => 'Registo errado'));
		
	}
}
?>