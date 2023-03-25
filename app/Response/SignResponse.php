<?php

namespace App\Response;

use App\DTO\ProductsDTO;

class SignResponse
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

    public function registerSuccess($message)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'message' => $message
        ));
    }

    public function error($message)
    {
        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'message' => $message
        );
    }
}
