<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\DTO\ProductsDTO;
use App\Models\ProductsModel;

class Product extends BaseController
{
    public function index()
    {
        // $productsList = new ProductsModel();
        // $data = $productsList->findAll();

        $productsList = new ProductsDTO();
        $data = $productsList->storage();
        return json_encode($data);
    }
}
