<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 23/04/2018
 * Time: 16:21
 */

namespace Model;

class Api {

    private $error;

    public function __construct()
    {
        $this->error = new Error;
    }

    public function getError()
    {
        return $this->error->getError();
    }

    public function authentication(string $email, string $token)
    {
        $email = trim(strip_tags($email));
        $token = trim(strip_tags($token));

        if (empty($email) || empty($token)){
            $this->error->setError('Parâmetros inválidos', 'Os parâmetros de autenticação não foram informados.');
            return false;
        }

        if ($email != 'gustavo@upinside.com.br' || $token != '123') {
            $this->error->setError('Acesso não autorizado!', 'Os parâmetros informados, não coincidem com o esperado.');
            return false;
        }

        return true;

    }
}