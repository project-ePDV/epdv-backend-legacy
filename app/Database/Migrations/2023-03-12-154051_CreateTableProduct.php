<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProduct extends Migration
{
    public function up()
    {
        $this->forge->dropTable('product', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false
            ],
            'amount' => [
                'type'          => 'INT',
                'constraint'    => '4',
                'null'          => false
            ],
            'brand' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true
            ],
            'price' => [
                'type'          => 'DECIMAL',
                'constraint'    => '10,2',
                'null'          => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
