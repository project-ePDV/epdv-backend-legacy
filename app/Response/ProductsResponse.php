<?php

namespace App\Response;

use App\DTO\ProductsDTO;
use Exception;

class ProductsResponse extends BaseResponse
{
    private $database;

    public function __construct($database)
    {
        parent::__construct();
        $this->database = $database;
    }

    public function responseFindAllProducts()
    {
        $productDTO = new ProductsDTO($this->database);
        $records = $productDTO->getAllProducts();

        if (!$productDTO->getAllProducts()) {
            throw new Exception('Não foi possível retornar os produtos');
        }

        return $this->responseAll($records);
    }
    
    public function responsePageableProducts($params)
    {
        extract($params);

        $productDTO = new ProductsDTO($this->database);
        $records = $productDTO->pageableProducts($page, $size);
        $count = $productDTO->countEntity();

        if (!$productDTO->pageableProducts($page, $size)) {
            throw new Exception('Não foi possível retornar os produtos');
        }

        return $this->responsePageable($records, $count, $params);
    }

    public function responseFilteredProducts($params)
    {
        extract($params);

        $productDTO = new ProductsDTO($this->database);
        $records = $productDTO->filteredProducts($params);
        $count = $productDTO->countWhereEntity($params);

        if (!$productDTO->filteredProducts($params)) {
            throw new Exception('Não foi possível retornar os produtos filtrados');
        }

        return $this->responsePageable($records, $count, $params);
    }

    public function responseProductById($id)
    {
        $productDTO = new ProductsDTO($this->database);
        $records = $productDTO->productById($id);
        
        if (!$productDTO->productById($id)) {
            throw new Exception('Produto não encontrado');
        }
        
        return $this->responseById($id, $records);
    }

    public function productSave($data)
    {
        $productDTO = new ProductsDTO($this->database);
        if (!$productDTO->productSave($data)) {
            throw new Exception('Não foi possível salvar os dados do produto');
        }

        return $this->responseGeneric('Produto cadastrado com sucesso');
    }

    public function productUpdate($data)
    {
        $productDTO = new ProductsDTO($this->database);

        if (!$productDTO->productUpdate($data)) {
            throw new Exception('Não foi possível atualizar o produto');
        }

        return $this->responseGeneric('Produto Atualizado com sucesso');
    }

    public function productDeleteById($id)
    {
        $productDTO = new ProductsDTO($this->database);

        if (!$productDTO->productDelete($id)) {
            throw new Exception('Não foi possível deletar o produto');
        }

        return $this->responseGeneric('Produto deletado com sucesso');
    }
}
