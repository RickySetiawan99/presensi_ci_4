<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Presence extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'employee_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'entry_date' => [
                'type'       => 'DATE',
            ],
            'clock_in' => [
                'type'       => 'TIME',
            ],
            'incoming_photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'exit_date' => [
                'type'       => 'DATE',
            ],
            'clock_out' => [
                'type'       => 'TIME',
            ],
            'photo_out' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('employee_id', 'employees', 'id');
        $this->forge->createTable('presences');
    }

    public function down()
    {
        $this->forge->dropTable('presences');
    }
}
