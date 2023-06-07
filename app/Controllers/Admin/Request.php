<?php

namespace App\Controllers\Admin;

use App\Response\ProductsRequestResponse;
use App\Response\RequestsResponse;
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
            'id'      => $this->request->getVar('id'),
            'date'    => date('Y-m-d'),
            'value'     => $this->request->getVar('value'),
            'fk_customer'     => null
        ];

        $response = new RequestsResponse($user);

        if ($response->requestSave($data)) {
            $data = $response->responseGeneric('Venda registrada com sucesso');
        }

        return $this->respond($data, 201, 'success');
    }

    public function registerProductsRequest($user)
    {
        $receiveData = $this->request->getVar();
        $response = new ProductsRequestResponse($user);

        if(count($receiveData) > 1) {
            foreach ($receiveData as $value) {
                $data = [
                    'fk_product' => $value->fk_product,
                    'fk_request' => $value->fk_request
                ];
    
                $response->productRequestSave($data);
            }
            $data = $response->responseGeneric('Registrado com sucesso');
        } else {
            $data = [
                'fk_product' => $receiveData[0]->fk_product,
                'fk_request' => $receiveData[0]->fk_request
            ];
            if ($response->productRequestSave($data)) {
                $data = $response->responseGeneric('Registrado com sucesso');
            }
        }
        
        return $this->respond($data, 201, 'success');
    }

    public function updateRequest($user, $id)
    {
        $data = [
            'id'      => $id,
            'date'    => date('Y-m-d'),
            'value'     => $this->request->getVar('value'),
            'fk_customer'     => null
        ];

        $response = new RequestsResponse($user);

        if ($response->requestUpdate($data)) {
            $data = $response->responseGeneric('Produto atualizado com sucesso');
        }
        return $this->respond($data, 204, 'success');
    }
}
