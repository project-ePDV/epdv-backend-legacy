<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DatabaseUserQueries;
use App\Models\UserDatabaseModel;
use App\Response\SignResponse;
use Exception;

class Sign extends BaseController
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

        try {
            $newUserDB = new UserDatabaseModel($name);
            $queries = new DatabaseUserQueries();
            $db = $newUserDB->createUserDB();
        } catch (Exception $error) {
            $response->setStatus(500);
            return $response->error($error);
        }
        
        try {
            foreach ($queries->getSQL() as $query) {
                $db->query($query); // Executa o SQL
            }
            $builder = $db->table('employee');
            $builder->insert($data);
        } catch (Exception $error) {
            $response->setStatus(500);
            return $response->error($error);
        }
        
    }
}