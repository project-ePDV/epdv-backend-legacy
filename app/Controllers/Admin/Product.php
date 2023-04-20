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

    public function registerProduct()
    {
        $data = [
            'name'      => $this->request->getGet('name'),
            'amount'    => $this->request->getGet('amount'),
            'brand'     => $this->request->getGet('brand'),
            'price'     => $this->request->getGet('price')
        ];

        $response = new ProductsResponse();
        $productModel = new ProductsModel();

        if ($productModel->save($data)) {
            $data = $response->responseProductGeneric('Produto registrado com sucesso');
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

    public function updateProduct($database, $id)
    {
        $response = new ProductsResponse();
        $data = $response->responseProductById($database, $id);

        return $this->respond($data, 200, 'success');
    }
}
