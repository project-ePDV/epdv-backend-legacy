<?php

namespace App\DTO;

class ProductsDTO extends BaseDTO
{
    private $column = 'id, name, amount, brand, price, status';
    public function __construct($database)
    {
        parent::__construct($database, "product");
    }

    public function getAllProducts()
    {
        return $this->getAllEntity();
    }

    public function pageableProducts($page, $size)
    {
        $params = [
            "page" => $page,
            "size" => $size
        ];

        return $this->pageableEntity($params, $this->column);
    }

    public function filteredProducts($params)
    {
        return $this->filterEntity($params, $this->column);
    }

    public function productById($id)
    {
        return $this->getEntityById($id, $this->column);
    }

    public function productSave($data)
    {
        return $this->saveEntity($data);
    }

    public function productUpdate($data)
    {
        return $this->updateEntity($data);
    }

    public function productDelete($id)
    {
        return $this->deleteEntity($id);
    }
}
