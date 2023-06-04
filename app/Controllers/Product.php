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
        $params = $this->request->getGet();
        extract($params);

        $response = new ProductsResponse($database);

        try {
            $data = $response->responseFindAllProducts($params);
            if (isset($page) && isset($size)) {
                $data = $response->responsePageableProducts($params);
            }
            if (isset($filter) && isset($minValue)) {
                $data = $response->responseFilteredProducts($params);
            }
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->responseError($exception), 500, $this->errorMessage);
        }
    }

    public function getProductById($database, $id)
    {
        $response = new ProductsResponse($database);
        
        try {
            $data = $response->responseProductById($id);
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->responseError($exception), 500, $this->errorMessage);
        }
    }
}