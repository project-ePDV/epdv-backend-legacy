<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProductProvider extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_product' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ],
            'fk_provider' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_product', 'product', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fk_provider', 'provider', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ProductProvider');
    }

    public function down()
    {
        $this->forge->dropTable('ProductProvider');
    }
}
