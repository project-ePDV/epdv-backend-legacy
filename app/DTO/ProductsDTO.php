<?php

namespace App\DTO;

use App\Models\ProductsModel;
use App\Utils\UserDatabaseModel;

class ProductsDTO extends ProductsModel
{
    private $user;
    private $database;

    public function __construct($database)
    {
        parent::__construct();
        $this->user = new UserDatabaseModel($database);
        $this->database = \Config\Database::connect($this->user->getUserConnection(), false);
    }

    public function getAllProducts()
    {
        return $this->database
            ->query('SELECT id, name, amount FROM product;')
            ->getResult();
    }

    public function pageableProducts($page, $size)
    {
        return $this->database
            ->table('product')
            ->select('id, name, amount')
            ->get($size, ($page - 1))
            ->getResult();
    }

    public function filteredProducts($filter, $value, $page, $size)
    {
        return $this->database
            ->table('product')
            ->select('id, name, amount')
            ->where($filter, $value)
            ->get($size, ($page - 1))
            ->getResult();
    }

    public function productById($id)
    {
        return $this->database
            ->table('product')
            ->select('id, name, amount')
            ->where('id', $id)
            ->get()
            ->getResult();
    }

    public function productSave($data)
    {
        $save = $this->database
            ->table('product')
            ->insert($data);

        return $save;
    }

    public function productUpdate($data)
    {
        $save = $this->database
            ->table('product')
            ->replace($data);

        return $save;
    }

    public function productDelete($id)
    {
        $delete = $this->database
            ->table('product')
            ->where('id', $id)
            ->delete();

        return $delete > 0;
    }
}
