<?php

namespace App\Response;

use App\DTO\ProductRequestDTO;

class ProductsRequestResponse extends BaseResponse
{
  private $database;

  public function __construct($database)
  {
    parent::__construct();
    $this->database = $database;
  }


  public function productRequestSave($data)
  {
    $requestDTO = new ProductRequestDTO($this->database);

    $requestDTO->productRequestSave($data);

    return $this->responseGeneric('Venda cadastrado com sucesso');
  }

  public function getAllProductsRequest()
  {
    $requestDTO = new ProductRequestDTO($this->database);
    $records = $requestDTO->getAllProductsRequest();

    return $this->responseAll($records);
  }

  public function getProductsRequestById($id)
  {
    $requestDTO = new ProductRequestDTO($this->database);
    $records = $requestDTO->productRequestById($id);

    return $this->responseById($id, $records);
  }
}
