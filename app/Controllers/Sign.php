<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Response\BaseResponse;
use App\Utils\DatabaseUserQueries;
use App\Utils\UserDatabaseModel;
use App\Response\SignResponse;
use App\Utils\JWT;
use App\Utils\RandomUUID;
use CodeIgniter\RESTful\ResourceController;
use DateTime;
use Exception;

class Sign extends ResourceController
{
    public function register()
    {

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $companyName = $this->request->getVar('companyName');
        $confirmPassword = $this->request->getVar('confirmPassword');

        $dbName = uniqid($companyName);

        $firstEmployee = [
            'cpf' => '00000000000',
            'name' => $name,
            'rg' => '000000000',
            'email' => $email,
            'telephone' => '000000000',
            'role' => 'admin'
        ];
        

        $user = [
            'name' => $name,
            'email' => $email,
            'companyName' => $companyName,
            'companyId' => $dbName,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];

        $response = new SignResponse();
        $response->setStatus(201);
        $err = $response->error('Internal Server Error');
        $success = $response->registerSuccess('Success');

        if ($password == $confirmPassword) {
            try {
                $db = \Config\Database::connect();
                $builder = $db->table('user');
                $builder->insert($user);
            } catch (Exception $error) {
                $response->setStatus(500);
                $err = $response->error('Não foi possível criar novo usuário');
                return $this->respond($err, 500, 'Internal Server Error');
            }
        } else {
            $response->setStatus(400);
            $err = $response->error('Dados inválidos');
            return $this->respond($err, 400, 'Bad Request');
        }

        try {
            
            $newUserDB = new UserDatabaseModel($dbName);
            $queries = new DatabaseUserQueries();
            $db = $newUserDB->createUserDB();
        } catch (Exception $error) {
            $response->setStatus(500);
            $err = $response->error('Não foi possível criar novo usuário');
            return $this->respond($err, 500, 'Internal Server Error');
        }

        try {
            foreach ($queries->getSQL() as $query) {
                $db->query($query); // Executa o SQL
            }
            $builder = $db->table('employee');
            $builder->insert($firstEmployee);
        } catch (Exception $error) {
            $response->setStatus(409);
            $err = $response->error('Usuário já exite');
            return $this->respond($err, 409, 'Conflict');
        }
        return $this->respond($success, 201);
    }

    public function authenticate()
    {
        $params = (array) $this->request->getVar();

        $userModel = new UserModel();
        $response = new BaseResponse();
        $session = \Config\Services::session();

        if ($userModel->authenticate($params)) {
            $company = $userModel->getCompany($params['email']);

            $token = JWT::getToken($userModel->getUser($params['email']));

            $userSession['userSession'] = isset($_SESSION['userSession']) ? $_SESSION['userSession'] : [];
            $tokenSession = [
                'token' => $token,
                'timestamp' => date('Y-m-d H:i:s', time())
            ];

            array_unshift($userSession['userSession'], $tokenSession);
            $session->set($userSession);

            return $this->respond($response->responseSign($company, $token), 200);
        }
        $response->setStatus(403);
        $data = $response->responseGeneric("Não autorizado");

        return $this->respond($data, 403);
    }

    public function valideToken($token)
    {
        $response = new BaseResponse();
        $time = JWT::decode($token, getenv('secret_key'))['timestamp'];
        $tokenTimeValid = !(($time + (1 * 24 * 60 * 60)) < time());

        if (JWT::valideToken($token, getenv('secret_key')) && $tokenTimeValid) {
            $data = $response->responseGeneric("Autorizado");
            return $this->respond($data, 200);
        }
        $data = $response->responseGeneric("Não autorizado");
        return $this->respond($data, 403);
    }

    public function expireAllToken()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return $this->respond(null, 204);
    }
}