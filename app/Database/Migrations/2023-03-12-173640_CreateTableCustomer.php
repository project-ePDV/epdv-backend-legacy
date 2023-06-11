<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCustomer extends Migration
{
    public function up()
    {
        $this->forge->dropTable('customer', true);
        $this->forge->addField([
            'cpf' => [
                'type'           => 'VARCHAR',
                'constraint' => '11',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false
            ],
            'rg' => [
                'type'          => 'VARCHAR',
                'constraint'    => '9',
                'null'          => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false
            ],
            'telephone' => [
                'type'          => 'VARCHAR',
                'constraint'    => '11',
                'null'          => true
            ],
            'fk_address' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'null'          => true
            ]
        ]);
        $this->forge->addKey('cpf', true);
        $this->forge->addForeignKey('fk_address', 'address', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
