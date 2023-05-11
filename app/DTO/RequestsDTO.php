<?php

namespace App\DTO;

use App\Models\requestsModel;
use App\Utils\UserDatabaseModel;

class RequestsDTO extends requestsModel
{
    private $user;
    private $database;

    public function __construct($database)
    {
        parent::__construct();
        $this->user = new UserDatabaseModel($database);
        $this->database = \Config\Database::connect($this->user->getUserConnection(), false);
    }

    public function getAllrequests()
    {
        return $this->database
            ->query('SELECT * FROM request;')
            ->getResult();
    }

    public function pageablerequests($page, $size)
    {
        return $this->database
            ->table('request')
            ->select()
            ->get($size, ($page - 1))
            ->getResult();
    }

    public function requestById($id)
    {
        return $this->database
            ->table('request')
            ->select()
            ->where('id', $id)
            ->get()
            ->getResult();
    }

    public function requestSave($data)
    {
        $save = $this->database
        ->table('request')
        ->insert($data);

        return $save;
    }

    public function requestUpdate($data)
    {
        $save = $this->database
        ->table('request')
        ->replace($data);

        return $save;
    }
}
