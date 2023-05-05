<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCostumer extends Migration
{
    public function up()
    {
        $this->forge->dropTable('costumer', true);
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
                'type'          => 'VARCHAR',
                'constraint'    => '9',
                'null'          => false
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
            'fk_address' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'null'          => true
            ]
        ]);
        $this->forge->addKey('cpf', true);
        $this->forge->addForeignKey('fk_address', 'address', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('costumer');
    }

    public function down()
    {
        $this->forge->dropTable('costumer');
    }
}
