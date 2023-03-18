<?php

namespace App\DTO;

use App\Models\ProductsModel;

class ProductsDTO extends ProductsModel
{

    public function __construct() {
        parent::__construct();
    }

    public function storage() {
        return $this->db
            ->query('SELECT id, name, amount FROM product;')
            ->getResult();
    }

    public function pageableProducts($page, $size) {
        return $this->db
            ->table('product')
            ->select('id, name, amount')
            ->get($size, ($page - 1))
            ->getResult();
    }

    public function filteredProducts($filter, $value, $page, $size) {
        return $this->db
            ->table('product')
            ->select('id, name, amount')
            ->where($filter, $value)
            ->get($size, ($page - 1))
            ->getResult();
    }
}
