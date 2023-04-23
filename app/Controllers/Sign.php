<?php

namespace App\Controllers;

use App\Utils\DatabaseUserQueries;
use App\Utils\UserDatabaseModel;
use App\Response\SignResponse;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Sign extends ResourceController
{
    public function register()
    {

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirmPassword = $this->request->getVar('confirmPassword');
        
        $firstEmployee = [
            'cpf'       => '00000000000',
            'name'      => $name,
            'rg'        => '000000000',
            'email'     => $email,
            'telephone' => '000000000',
            'role'      => 'admin'
        ];

        $user = [
            'name'      => $name,
            'email'     => $email,
            'password'  => password_hash($password, PASSWORD_BCRYPT)
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
            $newUserDB = new UserDatabaseModel($name);
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

    public function login()
    {

    }
}