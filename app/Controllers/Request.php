<?php

namespace App\Controllers;

use App\Models\RequestsModel;
use App\Response\ProductsRequestResponse;
use App\Response\RequestsResponse;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Request extends ResourceController
{
    private $errorMessage = 'Internal Server Error';

    public function index()
    {
        // algo sera feito aqui
    }

    public function getAllProductsRequest($user)
    {
        $response = new ProductsRequestResponse($user);

        try {
            $data = $response->getAllProductsRequest();
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->responseError($exception), 500, $this->errorMessage);
        }
    }

    public function getProductsRequestById($user, $id)
    {
        $response = new ProductsRequestResponse($user);

        try {
            $data = $response->getProductsRequestById($id);
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->responseError($exception), 500, $this->errorMessage);
        }
    }

    public function getRequestPageable($user)
    {
        $params = $this->request->getGet();

        $response = new RequestsResponse($user);

        try {
            $data = $response->responsePageableRequests($params);
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->responseError($exception), 500, $this->errorMessage);
        }
    }

    public function getRequestById($user, $id)
    {
        $response = new RequestsResponse($user);

        try {
            $data = $response->responseRequestById($id);
            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->responseError($exception), 500, $this->errorMessage);
        }
    }
}
