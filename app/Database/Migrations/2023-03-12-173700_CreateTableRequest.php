<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableRequest extends Migration
{
    public function up()
    {
        $this->forge->dropTable('request', true);
        $this->forge->addField([
            'id' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'date' => [
                'type'       => 'DATE',
                'null'       => false
            ],
            'value' => [
                'type'          => 'DECIMAL',
                'constraint'    => '10,2',
                'null'          => false
            ],
            'fk_customer' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
                'null'       => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_customer', 'customer', 'cpf', 'CASCADE', 'CASCADE');
        $this->forge->createTable('request');
    }

    public function down()
    {
        $this->forge->dropTable('request');
    }
}
