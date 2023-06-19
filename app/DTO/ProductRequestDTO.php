<?php

namespace App\DTO;

class ProductRequestDTO extends BaseDTO
{
    public function __construct($database)
    {
        parent::__construct($database, "product_request");
    }

    public function getAllProductsRequest()
    {
        return $this->getAllEntity();
    }

    public function productRequestById($id)
    {
        return $this->database
            ->table("product_request")
            ->select()
            ->where('fk_request', $id)
            ->get()
            ->getResult();
    }

    private function updateProduct($id)
    {
        $TABLE = 'product';

        $product =  $this->database
            ->table($TABLE)
            ->select()
            ->where('id', $id)
            ->get()
            ->getFirstRow();

        $amount = $product->amount - 1 < 0 ? 0 : $product->amount - 1;
        
        $this->database
            ->table($TABLE)
            ->set('amount', $amount)
            ->where('id', $id)
            ->update();

        return $this->database
            ->table($TABLE)
            ->select()
            ->where('id', $id)
            ->get()
            ->getFirstRow();
    }

    public function productRequestSave($data)
    {
        $this->saveEntity($data);
        return $this->updateProduct($data['fk_product']);
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
