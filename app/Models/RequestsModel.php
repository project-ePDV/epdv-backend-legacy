<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestsModel extends Model
{
    protected $table            = 'requests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['value'];
}
