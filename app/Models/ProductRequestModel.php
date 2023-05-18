<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductRequestModel extends Model
{
    protected $table            = 'productrequests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [];
}
