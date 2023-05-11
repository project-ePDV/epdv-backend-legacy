<?php

namespace App\Controllers\Admin;

use App\Response\ProductsResponse;
use App\Response\RequestsResponse;
use App\Utils\RandomUUID;
use CodeIgniter\RESTful\ResourceController;

class Request extends ResourceController
{
    public function index()
    {
        // algo será feito aqui
    }

    public function registerRequest($user)
    {
        $data = [
            'id'      => RandomUUID::getUUID('r'),
            'date'    => date('Y-m-d'),
            'value'     => $this->request->getVar('value'),
            'fk_customer'     => null
        ];

        $response = new RequestsResponse();

        if ($response->Requestsave($user, $data)) {
            $data = $response->responseProductGeneric('Venda registrada com sucesso');
        }
        return $this->respond($data, 200, 'success');
    }

    public function updateRequest($user, $id)
    {
        $data = [
            'id'      => $id,
            'date'    => date('Y-m-d'),
            'value'     => $this->request->getVar('value'),
            'fk_customer'     => null
        ];

        $response = new RequestsResponse();

        if ($response->requestUpdate($user, $data)) {
            $data = $response->responseProductGeneric('Produto atualizado com sucesso');
        }
        return $this->respond($data, 200, 'success');
    }

    public function deleteRequest($user, $id)
    {
        return $this->respond("", 200, 'success');
    }
}
