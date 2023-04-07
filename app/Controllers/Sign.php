<?php

namespace App\Controllers;

use App\Utils\DatabaseUserQueries;
use App\Utils\UserDatabaseModel;
use App\Response\SignResponse;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Sign extends ResourceController
{
    public function index()
    {

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirmPassword = $this->request->getVar('confirmPassword');
        
        $data = [
            'cpf'       => '00000000000',
            'name'      => $name,
            'rg'        => '000000000',
            'email'     => $email,
            'telephone' => '000000000',
            'role'      => 'admin'
        ];

        $response = new SignResponse();
        $err = $response->error('Internal Server Error');
        $success = $response->registerSuccess('Success');

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
            $builder->insert($data);
        } catch (Exception $error) {
            $response->setStatus(500);
            $err = $response->error('Usuário já exite');
            return $this->respond($err, 500, 'Internal Server Error');
        }
        return $this->respond($success, 200);
    }
}