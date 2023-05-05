<?php

namespace App\Controllers;

use App\Models\RequestsModel;
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

    public function getProductsFiltered($database)
    {
        $page = $this->request->getGet('page');
        $size = $this->request->getGet('size');

        $response = new RequestsResponse();

        try {
            $data = $response->responsePageableRequests($page, $size, $database);

            return $this->respond($data, 200, 'success');
        } catch (Exception $exception) {
            $response->setStatus(500);
            return $this->respond($response->error($exception), 500, $this->errorMessage);
        }
    }
}
