<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSysLog extends Migration
{
    public function up()
    {
        $this->forge->dropTable('sysLog', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'occurrence' => [
                'type'          => 'VARCHAR',
                'constraint'    => '250',
                'null'          => false
            ],
            'date' => [
                'type'       => 'DATE',
                'null'       => false
            ],
            'fk_customer' => [
                'type'          => 'VARCHAR',
                'constraint'    => '11',
                'null'          => false
            ],
            'fk_employee' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
                'null'       => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('fk_customer', 'customer', 'cpf', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fk_employee', 'employee', 'cpf', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sysLog');
    }

    public function down()
    {
        $this->forge->dropTable('sysLog');
    }
}
