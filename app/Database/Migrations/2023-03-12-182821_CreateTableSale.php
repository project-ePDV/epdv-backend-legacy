<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSale extends Migration
{
    public function up()
    {
        $this->forge->dropTable('sale', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type'       => 'DATE',
                'null'       => false
            ],
            'fk_request' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'null'          => false
            ],
            'fk_employee' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
                'null'       => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_request', 'request', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fk_employee', 'employee', 'cpf', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sale');
    }

    public function down()
    {
        $this->forge->dropTable('sale');
    }
}
