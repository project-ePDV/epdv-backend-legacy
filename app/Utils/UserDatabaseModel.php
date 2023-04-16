<?php

namespace App\Utils;

class UserDatabaseModel
{
  private $name;
  private $password;
  private $host;

  public function __construct($name, $password = 'admin123', $host = 'db_epdv') {
    $this->name = $name;
    $this->password = $password;
    $this->host = $host;
  }

  public function createUserDB()
  {
    $forge = \Config\Database::forge();

    $forge->createDatabase($this->name, true);

    $db = [
      #'hostname' => 'localhost',
      'hostname' => $this->host,
      'username' => 'root',
      #'password' => '',
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
      'password' => 'admin123',
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