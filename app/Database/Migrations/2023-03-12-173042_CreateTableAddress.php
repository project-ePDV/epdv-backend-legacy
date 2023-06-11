<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAddress extends Migration
{
    public function up()
    {
        $this->forge->dropTable('address', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false
            ],
            'number' => [
                'type'          => 'VARCHAR',
                'constraint'    => '5',
                'null'          => true
            ],
            'district' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ],
            'city' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'null'          => true
            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true
            ],
            'cep' => [
                'type'          => 'VARCHAR',
                'constraint'    => '8',
                'null'          => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('address');
    }

    public function down()
    {
        $this->forge->dropTable('address');
    }
}
