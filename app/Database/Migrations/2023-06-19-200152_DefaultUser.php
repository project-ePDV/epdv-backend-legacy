<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DefaultUser extends Migration
{
    public function up()
    {
        $data = '"epdv", "epdv@test.com", "$2y$10$nndxxr943Zsp7kNVVUtMuegFPixwMyEJ30B.HkAGKSxfmSc8W4.5.", "db_epdv", "db_epdv"';

        $this->db->query("INSERT INTO user (name, email, password, companyName, companyId) VALUES ($data);");
    }

    public function down()
    {
        //
    }
}
