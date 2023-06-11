<?php

namespace App\Utils;

class Validators
{
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
    $required = [];

    foreach ($params as $param) {
      if (!isset($this->receiveParams[$param]) || $this->receiveParams[$param] === '') {
        $required[$param] = "$param is required";
      }
    }

    if (!empty($required)) {
      $this->validations['validations'][] = ['required' => $required];
    }
  }
}

$params = [
  'nome' => '123',
  'email' => '',
  'senha' => '2'
];

$validations = new Validators($params);

$validations->isRequired(['nome', 'email']);
