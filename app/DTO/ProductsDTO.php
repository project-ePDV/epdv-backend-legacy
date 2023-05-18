<?php

namespace App\DTO;

class ProductsDTO extends BaseDTO
{
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

        return $this->pageableEntity($params);
    }

    public function filteredProducts($filter, $value, $page, $size)
    {
        $params = [
            "page" => $page,
            "size" => $size,
            "filter" => $filter,
            "value" => $value,
        ];

        return $this->filterEntity($params);
    }

    public function productById($id)
    {
        return $this->getEntityById($id);
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
