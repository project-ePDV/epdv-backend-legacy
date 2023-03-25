<?php

namespace App\Response;

use App\DTO\ProductsDTO;

class ProductsResponse
{
    private $timestamp;
    private $records;
    private $status = 200;

    public function __construct() {
        $this->timestamp = time();
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function responsePageableProducts($page, $size, $database) 
    {
        $productDTO = new ProductsDTO();
        $this->records = $productDTO->pageableProducts($page, $size, $database);

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'page' => $page,
            'size' => $size,
            'records' => $this->records
        ));
    }

    public function responseFilteredProducts($filter, $value, $page, $size)
    {
        $productsList = new ProductsDTO();
        $this->records = $productsList->filteredProducts($filter, $value, $page, $size);

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'page' => $page,
            'size' => $size,
            'filter' => $filter,
            'records' => $this->records
        ));
    }

    public function error($message)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'message' => $message
        ));
    }
}
