<?php

namespace App\DTO;

class RequestsDTO extends BaseDTO
{

    private $column = 'id, date, value';

    public function __construct($database)
    {
        parent::__construct($database, "request");
    }

    public function getAllrequests()
    {
        return $this->getAllEntity($this->column);
    }

    public function pageableRequests($page, $size)
    {
        $params = [
            "page" => $page,
            "size" => $size
        ];
        
        return $this->pageableEntity($params, $this->column);
    }

    public function requestById($id)
    {
        return $this->getEntityById($id, $this->column);
    }

    public function requestSave($data)
    {
        return $this->saveEntity($data);
    }

    public function requestUpdate($data)
    {
        return $this->updateEntity($data);
    }
}
