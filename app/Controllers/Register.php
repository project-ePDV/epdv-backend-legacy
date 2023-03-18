<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Migration\Forge;

class Register extends BaseController
{
    public function index($dbName)
    {

        $test = [
            'DSN'      => '',
            'hostname' => 'db_epdv',
            'username' => 'root',
            'password' => 'admin123',
            'database' => "$dbName",
            'DBDriver' => 'MySQLi',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => (ENVIRONMENT !== 'production'),
            'charset'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
        ];

        $forge = \Config\Database::forge();

        $forge->createDatabase($dbName, true);

        $db = \Config\Database::connect($test, false);

        foreach ($this->getSQL() as $query) {
            $db->query($query); // Executa o SQL
        }
    }


    private function getSQL() 
    {
        return $SQLQuery = [
            "CREATE TABLE product (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                amount INT(4) NOT NULL,
                brand VARCHAR(50),
                price DECIMAL(10,2) NOT NULL
            ) engine = InnoDB;",
            "CREATE TABLE address (
                id INT PRIMARY KEY AUTO_INCREMENT,
                address VARCHAR(100) NOT NULL,
                number VARCHAR(5) NOT NULL,
                district VARCHAR(100),
                city VARCHAR(100) NOT NULL,
                state VARCHAR(50),
                cep VARCHAR(8) NOT NULL
            ) engine = InnoDB;"
        ];
    }
}