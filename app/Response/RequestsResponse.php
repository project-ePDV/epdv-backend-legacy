<?php

namespace App\Response;

use App\DTO\RequestsDTO;
use Exception;

class RequestsResponse
{
  private $timestamp;
  private $status = 200;

  public function __construct()
  {
    $this->timestamp = time();
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function responsePageableRequests($page, $size, $database)
  {
    $requestDTO = new RequestsDTO($database);
    if (!$requestDTO->pageableRequests($page, $size, $database)) {
      throw new Exception('Não foi possível retornar as vendas');
    }

    return (array(
      'status' => $this->status,
      'timestamp' => $this->timestamp,
      'date' => date('Y-m-d H:i:s', $this->timestamp),
      'page' => $page,
      'size' => $size,
      'records' => $requestDTO->pageableRequests($page, $size, $database)
    ));
  }

  public function responseProductById($id, $database)
  {
    $product = new RequestsDTO($database);

    if (!$product->productById($id)) {
      throw new Exception('Venda não encontrada');
    }

    return (array(
      'status' => $this->status,
      'timestamp' => $this->timestamp,
      'date' => date('Y-m-d H:i:s', $this->timestamp),
      'filter' => 'id',
      'records' => $product->productById($id)
    ));
  }

  public function Requestsave($user, $data)
  {
    $requestDTO = new RequestsDTO($user);

    if (!$requestDTO->Requestsave($data)) {
      throw new Exception('Não foi possível salvar os dados da venda');
    }

    return $this->responseProductGeneric('Venda cadastrado com sucesso');
  }

  public function requestUpdate($user, $data)
  {
    $requestDTO = new RequestsDTO($user);

    if (!$requestDTO->requestUpdate($data)) {
      throw new Exception('Não foi possível atualizar a venda');
    }

    return $this->responseProductGeneric('Venda não pode ser atualizado');
  }

  public function responseProductGeneric($message)
  {
    return (array(
      'status' => $this->status,
      'timestamp' => $this->timestamp,
      'date' => date('Y-m-d H:i:s', $this->timestamp),
      'message' => $message
    ));
  }

  public function error($exception)
  {
    return (array(
      'status' => $this->status,
      'timestamp' => $this->timestamp,
      'date' => date('Y-m-d H:i:s', $this->timestamp),
      'message' => $exception->getMessage()
    ));
  }
}
