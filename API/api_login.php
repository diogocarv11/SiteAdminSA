<?php

require_once 'includes/jwt_utils.php';
include_once "../utilizadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	$data = json_decode(file_get_contents("php://input", true));

    $user = new User();
    $user->setEmailUser($data->email);
    $user->setPasswordUser($data->password);


    $result = $user->verificaLogin();

	if(count($result) == 0) {
		echo json_encode(array('error' => 'Login errado'));
	} else {
		
		
		$headers = array('alg'=>'HS256','typ'=>'JWT');
		$payload = array(
			'email'=> $data->email,
			'exp'=> (time() + 3600),
			'idUtilizador' =>  $result[0]["idUser"]
		);

		$jwt = generate_jwt($headers, $payload);
		
		echo json_encode(array('token' => $jwt));
	}
}

?>