<?php

namespace App\Utils;

class Validators
{
  private $params;
  private $receiveParams;
  private $validations;

  public function __construct($receiveParams)
  {
    $this->receiveParams = $receiveParams;
    $this->validations['validations'] = [];
  }

  public function getValidations()
  {
    return $this->validations;
  }

  public function isRequired($params)
  {
    $required['required'] = [];

    foreach ($params as $param) {
      if (!isset($this->receiveParams[$param]) || $this->receiveParams[$param] === '') {
        array_push($required['required'], "$param is required");
      }
    }
    array_push($this->validations['validations'], $required);
  }
}

$params = [
  'nome' => '123',
  'email' => '321',
  'senha' => '2'
];


$validations = new Validators($params);

$validations->isRequired(['nome', 'email']);

print_r(json_encode($validations->getValidations()));




