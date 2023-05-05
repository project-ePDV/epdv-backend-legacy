<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductRequest extends Migration
{
    public function up()
    {
        $this->forge->dropTable('ProductRequest', true);
        $this->forge->addField([
            'id' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'fk_product'     => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ],
            'fk_request'     => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_product', 'product', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fk_request', 'request', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ProductRequest');
    }

    public function down()
    {
        $this->forge->dropTable('ProductRequest');
    }
}
