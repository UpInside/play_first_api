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

$users[] = ['user_id' => 0, 'user_name' => 'Gustavo', 'user_last_name' => 'Web'];
$users[] = ['user_id' => 1, 'user_name' => 'Robson', 'user_last_name' => 'V. Leite'];

//unset($users);

if(empty($users)){
    $error->setError('Não há registros para exibir!', 'Até o momento não há usuários cadastrados na base, cadastre ao menos um e teste novamente.');
    echo json_encode($error->getError(), JSON_PRETTY_PRINT);
    exit;
} else {
    echo json_encode($users, JSON_PRETTY_PRINT);
    exit;
}