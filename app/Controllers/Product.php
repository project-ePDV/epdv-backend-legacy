<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Response\ProductsResponse;
use CodeIgniter\HTTP\Request;
use Exception;

class Product extends BaseController
{
    public function index()
    {
        $filter = $this->request->getGet('filter');
        $value = $this->request->getGet('value');
        $page = $this->request->getGet('page');
        $size = $this->request->getGet('size');

        try {
            $response = new ProductsResponse();
            $response->setStatus(200);
            if ($filter) return $response->responseFilteredProducts($filter, $value, $page, $size);
            return $response->responsePageableProducts($page, $size);
        } catch(Exception $error) {
            $response->setStatus(500);
            return $response->error($error);
        }
    }

    public function getProductsFilter()
    {

        $filter = $this->request->getGet('filter');
        $value = $this->request->getGet('value');
        $page = $this->request->getGet('page');
        $size = $this->request->getGet('size');

        try {
            $response = new ProductsResponse();
            $response->setStatus(200);
            return $response->responseFilteredProducts($filter, $value, $page, $size);
        } catch(Exception $error) {
            $response->setStatus(500);
            return $response->error($error);
        }
    }
}
