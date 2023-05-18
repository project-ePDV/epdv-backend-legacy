<?php

namespace App\DTO;

class ProductRequestDTO extends BaseDTO
{
    public function __construct($database)
    {
        parent::__construct($database, "ProductRequest");
    }

    public function getAllProductsRequest()
    {
        return $this->getAllEntity();
    }

    public function productRequestById($id)
    {
        return $this->database
            ->table("ProductRequest")
            ->select()
            ->where('fk_request', $id)
            ->get()
            ->getResult();
    }

    public function productRequestSave($data)
    {
        return $this->saveEntity($data);
    }

    public function productRequestUpdate($data)
    {
        return $this->updateEntity($data);
    }

    public function productRequestDelete($id)
    {
        return $this->deleteEntity($id);
    }
}
