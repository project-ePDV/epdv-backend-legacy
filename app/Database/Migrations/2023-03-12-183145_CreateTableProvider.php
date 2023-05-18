<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProvider extends Migration
{
    public function up()
    {
        $this->forge->dropTable('provider', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => false
            ],
            'fk_address' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'null'          => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_address', 'address', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('provider');
    }

    public function down()
    {
        $this->forge->dropTable('provider');
    }
}
