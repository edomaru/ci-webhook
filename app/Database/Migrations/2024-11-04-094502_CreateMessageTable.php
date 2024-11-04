<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMessageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'message_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true
            ],
            'from' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'payload' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['submitted', 'sent', 'delivered', 'read', 'failed', 'deleted'],
                'default' => 'submitted'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('messages');
    }

    public function down()
    {
        $this->forge->dropTable('messages');
    }
}
