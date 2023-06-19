<?php

namespace App\Utils;

use Config\Database;

class UserDatabaseModel
{
  private $name;
  private $password;
  private $host;

  public function __construct($name) {
    $this->name = $name;
    $this->password = getenv('database.default.password');
    $this->host = getenv('database.default.hostname');
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