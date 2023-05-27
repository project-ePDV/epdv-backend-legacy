<?php

namespace App\Response;

use App\DTO\ProductsDTO;
use Exception;

class BaseResponse
{
    private $timestamp;
    private $status = 200;

    public function __construct()
    {
        $this->timestamp = time();
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function responseAll($response)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'records' => $response
        ));
    }

    public function responsePageable($params = [], $response)
    {
        extract($params);

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'params' => $params,
            'records' => $response
        ));
    }

    public function responseFiltered($params, $response)
    {
        extract($params);

        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'params' => $params,
            'records' => $response
        ));
    }

    public function responseById($id, $response)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'id' => $id,
            'records' => $response
        ));
    }
    public function responseSign($params, $token)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'company' => $params,
            'token' => $token
        ));
    }

    public function responseGeneric($message)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'message' => $message
        ));
    }

    public function responseError($exception)
    {
        return (array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date('Y-m-d H:i:s', $this->timestamp),
            'message' => $exception->getMessage()
        ));
    }
}
