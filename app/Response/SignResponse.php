<?php

namespace App\Response;

use App\DTO\ProductsDTO;

class SignResponse
{
    private $timestamp;
    private $records;
    private $status;

    public function __construct() {
        $this->timestamp = time();
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function error($error)
    {
        header('Content-Type: application/json');
        return json_encode(array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'message' => $error->getMessage()
        ));
    }
}
