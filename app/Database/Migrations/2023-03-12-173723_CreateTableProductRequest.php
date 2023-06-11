<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductRequest extends Migration
{
    public function up()
    {
        $this->forge->dropTable('product_request', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_product'     => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ],
            'fk_request'     => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null'       => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_product', 'product', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fk_request', 'request', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product_request');
    }

    public function down()
    {
        $this->forge->dropTable('product_request');
    }
}
