<?php

namespace App\Controllers\Admin;

use App\Models\ProductsModel;
use App\Response\ProductsResponse;
use CodeIgniter\RESTful\ResourceController;

class Product extends ResourceController
{
    public function index()
    {
        // algo será feito aqui
    }

    public function registerProduct($user)
    {
        $data = [
            'name'      => $this->request->getVar('name'),
            'amount'    => $this->request->getVar('amount'),
            'brand'     => $this->request->getVar('brand'),
            'price'     => $this->request->getVar('price')
        ];

        $response = new ProductsResponse();

        if ($response->productSave($user, $data)) {
            $data = $response->responseProductGeneric('Produto registrado com sucesso');
        }
        return $this->respond($data, 200, 'success');
    }

    public function updateProduct($user, $id)
    {
        $data = [
            'id'        => $id,
            'name'      => $this->request->getVar('name'),
            'amount'    => $this->request->getVar('amount'),
            'brand'     => $this->request->getVar('brand'),
            'price'     => $this->request->getVar('price')
        ];

        $response = new ProductsResponse();

        if ($response->productUpdate($user, $data)) {
            $data = $response->responseProductGeneric('Produto atualizado com sucesso');
        }
        return $this->respond($data, 200, 'success');
    }

    public function deleteProduct($user, $id)
    {
        $response = new ProductsResponse();

        if ($response->productDeleteById($user, $id)) {
            $data = $response->responseProductGeneric('Produto deletado com sucesso');
        }
        return $this->respond($data, 200, 'success');
    }
}
