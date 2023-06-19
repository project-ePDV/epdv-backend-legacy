<?php

namespace App\Response;

class BaseResponse
{
    private $timestamp;
    private $status = 200;
    private $DATE_FORMAT = 'Y-m-d H:i:s';

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
        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date($this->DATE_FORMAT, $this->timestamp),
            'records' => $response
        );
    }

    public function responsePageable($response, $count, $params = [])
    {
        extract($params);

        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date($this->DATE_FORMAT, $this->timestamp),
            'params' => $params,
            'total' => $count,
            'records' => $response
        );
    }

    public function responseById($id, $response)
    {
        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date($this->DATE_FORMAT, $this->timestamp),
            'id' => $id,
            'records' => $response
        );
    }

    public function responseSign($params, $token, $email)
    {
        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date($this->DATE_FORMAT, $this->timestamp),
            'company' => $params,
            'token' => $token,
            'email' => $email
        );
    }

    public function responseGeneric($message)
    {
        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date($this->DATE_FORMAT, $this->timestamp),
            'message' => $message
        );
    }

    public function responseError($exception)
    {
        return array(
            'status' => $this->status,
            'timestamp' => $this->timestamp,
            'date' => date($this->DATE_FORMAT, $this->timestamp),
            'message' => $exception->getMessage()
        );
    }
}
