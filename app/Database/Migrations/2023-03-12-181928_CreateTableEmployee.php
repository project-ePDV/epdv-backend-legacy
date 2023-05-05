<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEmployee extends Migration
{
    public function up()
    {
        $this->forge->dropTable('employee', true);
        $this->forge->addField([
            'cpf' => [
                'type'           => 'VARCHAR',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false
            ],
            'rg' => [
                'type' => 'VARCHAR',
                'constraint' => '9',
                'null' => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true
            ],
            'telephone' => [
                'type'          => 'VARCHAR',
                'constraint'    => '11',
                'null'          => false
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false
            ]
        ]);
        $this->forge->addKey('cpf', true);
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
