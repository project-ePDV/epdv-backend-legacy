<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\DTO\ProductsDTO;
use App\Response\ProductsResponse;
use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Product extends ResourceController
{
    public function index()
    {
        $filter = $this->request->getGet('filter');
        $value = $this->request->getGet('value');
        $page = $this->request->getGet('page');
        $size = $this->request->getGet('size');

        $response = new ProductsResponse();
        $err = $response->error('Internal Server Error');
        $database = $this->request->uri->getSegment(2);
        
        try {
            $data = $response->responsePageableProducts($page, $size, $database);
            if (isset($filter) && isset($value)) {
                $data = $response->responseFilteredProducts($filter, $value, $page, $size);
            }
            return $this->respond($data, 200, 'success');
        } catch (Exception $error) {
            return $this->respond($err, 500, 'Internal Server Error');
        }
    }

    public function getProductsFilter()
    {
        $filter = $this->request->getGet('filter');
        $value = $this->request->getGet('value');
        $page = $this->request->getGet('page');
        $size = $this->request->getGet('size');

        $response = new ProductsResponse();
        $err = $response->error('Internal Server Error');

        try {
            return $response->responseFilteredProducts($filter, $value, $page, $size);
        } catch (Exception $error) {
            return $this->respond($err, 500, 'Internal Server Error');
        }
    }
}
