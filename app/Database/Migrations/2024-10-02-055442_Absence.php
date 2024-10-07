<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absence extends Migration
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
            'explanation' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'submission_status' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('employee_id', 'employees', 'id');
        $this->forge->createTable('absences');
    }

    public function down()
    {
        $this->forge->dropTable('absences');
    }
}
