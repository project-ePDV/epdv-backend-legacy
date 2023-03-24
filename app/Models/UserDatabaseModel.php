<?php

namespace App\Models;

class UserDatabaseModel
{
  private $name;
  private $password;

  public function __construct($name, $password = '') {
    $this->name = $name;
    $this->password = $password;
  }

  public function createUserDB()
  {
    $forge = \Config\Database::forge();

    $forge->createDatabase($this->name, true);

    $db = [
      'DSN'      => '',
      'hostname' => 'localhost',
      'username' => 'root',
      'password' => $this->password,
      'database' => $this->name,
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

    return \Config\Database::connect($db, false);
  }
}