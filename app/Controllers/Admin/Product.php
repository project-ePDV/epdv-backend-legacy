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

    public function registerProduct($database)
    {
        $data = [
            'name'      => $this->request->getVar('name'),
            'amount'    => $this->request->getVar('amount'),
            'brand'     => $this->request->getVar('brand'),
            'price'     => $this->request->getVar('price')
        ];

        $response = new ProductsResponse($database);

        return $this->respond($response->productSave($data), 201, 'success');
    }

    public function updateProduct($database, $id)
    {
        $data = [
            'id'        => $id,
            'name'      => $this->request->getVar('name'),
            'amount'    => $this->request->getVar('amount'),
            'brand'     => $this->request->getVar('brand'),
            'price'     => $this->request->getVar('price')
        ];

        $response = new ProductsResponse($database);

        return $this->respond($response->productUpdate($data), 204, 'success');
    }

    public function deleteProduct($database, $id)
    {
        $response = new ProductsResponse($database);

        $data = $response->productDeleteById($id);

        return $this->respond($data, 204, 'success');
    }
}
