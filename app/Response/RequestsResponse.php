<?php

namespace App\Response;

use App\DTO\ProductsRequestDTO;
use App\DTO\RequestsDTO;
use Exception;

class RequestsResponse extends BaseResponse
{
  private $database;

  public function __construct($database)
  {
    parent::__construct();
    $this->database = $database;
  }

  public function responsePageableRequests($params)
  {
    extract($params);

    $requestDTO = new RequestsDTO($this->database);
    $records = $requestDTO->pageableRequests($page, $size);

    if (!$requestDTO->pageableRequests($page, $size)) {
      throw new Exception('Não foi possível retornar as vendas');
    }

    return $this->responsePageable($params, $records);
  }

  public function responseRequestById($id)
  {
    $requestDTO = new RequestsDTO($this->database);
    $records = $requestDTO->requestById($id);

    if (!$requestDTO->requestById($id)) {
      throw new Exception('Venda não encontrada');
    }

    return $this->responseById($id, $records);
  }

  public function requestSave($data)
  {
    $requestDTO = new RequestsDTO($this->database);

    if (!$requestDTO->Requestsave($data)) {
      throw new Exception('Não foi possível salvar os dados da venda');
    }

    return $this->responseGeneric('Venda cadastrado com sucesso');
  }

  public function requestUpdate($data)
  {
    $requestDTO = new RequestsDTO($this->database);

    if (!$requestDTO->requestUpdate($data)) {
      throw new Exception('Não foi possível atualizar a venda');
    }

    return $this->responseGeneric('Venda não pode ser atualizado');
  }
}
