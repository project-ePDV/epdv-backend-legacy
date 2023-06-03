<?php

namespace App\DTO;

use App\Models\ProductsModel;
use App\Utils\UserDatabaseModel;
use CodeIgniter\Model;

class BaseDTO
{
  private $user;
  protected $database;
  private $table;

  public function __construct($database, $table)
  {
    $this->user = new UserDatabaseModel($database);
    $this->database = \Config\Database::connect($this->user->getUserConnection(), false);
    $this->table = $table;
  }

  public function getAllEntity($column = "*")
  {
    return $this->database
      ->table($this->table)
      ->select($column)
      ->get()
      ->getResult();
  }

  public function countEntity() 
  {
    return $this->database
      ->table($this->table)
      ->countAllResults();
  }

  public function countWhereEntity($filter, $value) 
  {
    return $this->database
      ->table($this->table)
      ->where($filter, $value)
      ->countAllResults();
  }

  public function pageableEntity($params, $column = "*")
  {
    return $this->database
      ->table($this->table)
      ->select($column)
      ->get($params["size"], ($params['page'] - 1))
      ->getResult();
  }

  public function filterEntity($params, $column = "*")
  {
    return $this->database
      ->table($this->table)
      ->select($column)
      ->where($params["filter"], $params["value"])
      ->get($params["size"], ($params['page'] - 1))
      ->getResult();
  }

  public function getEntityById($id, $column = "*")
  {
    return $this->database
      ->table($this->table)
      ->select($column)
      ->where('id', $id)
      ->get()
      ->getResult();
  }

  public function saveEntity($data)
  {
    $save = $this->database
      ->table($this->table)
      ->insert($data);

    return $save;
  }

  public function updateEntity($data)
  {
    $save = $this->database
      ->table($this->table)
      ->replace($data);

    return $save;
  }

  public function deleteEntity($id)
  {
    $delete = $this->database
      ->table($this->table)
      ->where('id', $id)
      ->delete();

    return $delete > 0;
  }
}
