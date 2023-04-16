<?php

namespace App\Controllers;

use App\Response\ProductsResponse;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Product extends ResourceController
{
    private $errorMessage = 'Internal Server Error';

    public function index()
    {
        // algo sera feito aqui
    }

    public function getProductsFiltered($database)
    {
        $filter = $this->request->getGet('filter');
        $value = $this->request->getGet('value');
        $page = $this->request->getGet('page');
        $size = $this->request->getGet('size');

        $response = new ProductsResponse();

        try {
            $data = $response->responsePageableProducts($page, $size, $database);
            if (isset($filter) && isset($value)) {
                $data = $response->responseFilteredProducts($filter, $value, $page, $size, $database);
            }
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->error($exception), 500, $this->errorMessage);
        }
    }

    public function getProductById($database, $id)
    {
        $response = new ProductsResponse();
        
        try {
            $data = $response->responseProductById($id, $database);
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->error($exception), 500, $this->errorMessage);
        }
    }
}