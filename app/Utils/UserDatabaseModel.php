<?php

namespace App\Utils;

use Config\Database;

class UserDatabaseModel
{
  private $name;
  private $password;
  private $host;

  public function __construct($name, $password = '', $host = 'localhost') {
    $test = new Database();
    $this->name = $name;
    $this->password = $password;
    $this->host = $test->default['hostname'] ? $test->default['hostname'] : $host;
  }

  public function createUserDB()
  {
    $forge = \Config\Database::forge();

    $forge->createDatabase($this->name, true);

    $db = [
      'hostname' => $this->host,
      'username' => 'root',
      'password' => $this->password,
      'database' => $this->name,
      'DBDriver' => 'MySQLi',
      'pConnect' => false,
      'DBDebug'  => (ENVIRONMENT !== 'production'),
      'port'     => 3306,
    ];

    return \Config\Database::connect($db, false);
  }

  public function getUserConnection() {
    return [
      'hostname' => $this->host,
      'username' => 'root',
      'password' => $this->password,
      'database' => $this->name,
      'DBDriver' => 'MySQLi',
      'pConnect' => false,
      'DBDebug'  => (ENVIRONMENT !== 'production'),
      'port'     => 3306,
    ];
  }

  public function getConnection() {
    return [
      'hostname' => 'db_epdv',
      'username' => 'root',
      'password' => 'admin123',
      'database' => 'db_epdv',
      'DBDriver' => 'MySQLi',
      'pConnect' => false,
      'DBDebug'  => (ENVIRONMENT !== 'production'),
      'port'     => 3306,
    ];
  }
}