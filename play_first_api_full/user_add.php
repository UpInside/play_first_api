<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 23/04/2018
 * Time: 14:03
 */

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/vendor/autoload.php';

$error = new \Model\Error;
$api = new \Model\Api;

$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
$token = filter_input(INPUT_GET, 'token', FILTER_DEFAULT);

$apiComm = $api->authentication($email, $token);

if ($apiComm == false){
    echo json_encode($api->getError(), JSON_PRETTY_PRINT);
    exit;
}

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($postData)){
    $error->setError('Parâmetros não informados', 'Para utilizar esse endpoint e necessário informar dados via POST');
    echo json_encode($error->getError(), JSON_PRETTY_PRINT);
    exit;
}

$postData = array_map('strip_tags', $postData);
$postData = array_map('trim', $postData);

$newUser = [
    'user_name' => $postData['user_name'],
    'user_last_name' => $postData['user_last_name']
];

//echo json_encode($newUser, JSON_PRETTY_PRINT);

$error->setError('Cadastro com sucesso!', 'O usuário foi cadastrado com sucesso na base de dados.');
echo json_encode($error->getError(), JSON_PRETTY_PRINT);
exit;