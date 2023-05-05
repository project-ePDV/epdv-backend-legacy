<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->forge->dropTable('user', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => '60',
                'null'          => false
            ],
            'companyName' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null'       => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}

