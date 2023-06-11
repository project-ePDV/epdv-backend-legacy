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

  public function countEntity() 
  {
    return $this->database
      ->table($this->table)
      ->countAllResults();
  }

  public function maxValue($filter) {
    return $this->database
      ->table($this->table)
      ->selectMax($filter)
      ->get()
      ->getFirstRow()->$filter;
  }

  public function countWhereEntity($params) 
  {
    extract($params);
    return $this->database
      ->table($this->table)
      ->where($filter . '>=', $minValue)
      ->where($filter . '<=', $this->getMaxValue($params))
      ->countAllResults();
  }
  
  public function getAllEntity($column = "*")
  {
    return $this->database
      ->table($this->table)
      ->select($column)
      ->get()
      ->getResult();
  }

  public function pageableEntity($params, $column = "*")
  {
    extract($params);

    return $this->database
      ->table($this->table)
      ->select($column)
      ->get($size, $this->getPage($page, $size))
      ->getResult();
  }

  public function filterEntity($params, $column = "*")
  {
    extract($params);
    return $this->database
      ->table($this->table)
      ->select($column)
      ->where($filter . '>=', $minValue)
      ->where($filter . '<=', $this->getMaxValue($params))
      ->get($size, $this->getPage($page, $size))
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

  private function getPage($page, $size)
  {
    return (($page - 1) * $size);
  }

  private function getMaxValue($params) {
    extract($params);
    return isset($maxValue) ? $maxValue : $this->maxValue($filter);
  }
}
