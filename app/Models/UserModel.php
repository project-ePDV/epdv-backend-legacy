<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [];

    public function getCompany($email)
    {
        return $this->db
            ->table($this->table)
            ->select('companyName')
            ->where("email", $email)
            ->get()
            ->getFirstRow();
    }

    public function getUser($email)
    {
        return $this->db
            ->table($this->table)
            ->select('name, email, companyName')
            ->where("email", $email)
            ->get()
            ->getRowArray();
    }

    public function getCredentials($email)
    {
        return $this->db
            ->table($this->table)
            ->select('email, password')
            ->where("email", $email)
            ->get()
            ->getFirstRow();
    }

    public function authenticate($params)
    {
        extract($params);

        $pwdHash = $this->getCredentials($email)->password;

        return password_verify($password, $pwdHash);
    }
}
