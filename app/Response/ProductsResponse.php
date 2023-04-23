<?php

namespace App\Response;

use App\DTO\ProductsDTO;
use Exception;

class ProductsResponse
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

    public function responsePageableProducts($page, $size, $database)
    {
        $productDTO = new ProductsDTO($database);
        if (!$productDTO->pageableProducts($page, $size, $database)) {
            throw new Exception('Não foi possível retornar os produtos');
        }

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'page' => $page,
            'size' => $size,
            'records' => $productDTO->pageableProducts($page, $size, $database)
        ));
    }

    public function responseFilteredProducts($filter, $value, $page, $size, $database)
    {
        $productsList = new ProductsDTO($database);

        if (!$productsList->filteredProducts($filter, $value, $page, $size)) {
            throw new Exception('Não foi possível retornar os produtos filtrados');
        }

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'page' => $page,
            'size' => $size,
            'filter' => $filter,
            'records' => $productsList->filteredProducts($filter, $value, $page, $size)
        ));
    }

    public function responseProductById($id, $database)
    {
        $product = new ProductsDTO($database);

        if (!$product->productById($id)) {
            throw new Exception('Produto não encontrado');
        }
        

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'filter' => 'id',
            'records' => $product->productById($id)
        ));
    }

    public function productDeleteById($database, $id)
    {
        $productDTO = new ProductsDTO($database);

        if (!$productDTO->productDelete($id)) {
            throw new Exception('Não foi possível deletar o produto');
        }

        return $this->responseProductGeneric('Produto deletado com sucesso');
    }

    public function productSave($user, $data)
    {
        $productDTO = new ProductsDTO($user);

        if (!$productDTO->productSave($data)) {
            throw new Exception('Não foi possível salvar os dados do produto');
        }

        return $this->responseProductGeneric('Produto cadastrado com sucesso');
    }

    public function productUpdate($user, $data)
    {
        $productDTO = new ProductsDTO($user);

        if (!$productDTO->productUpdate($data)) {
            throw new Exception('Não foi possível atualizar o produto');
        }

        return $this->responseProductGeneric('Produto não pode ser atualizado');
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
