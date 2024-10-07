<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PresenceLocation extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tipe' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'latitude' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'longitude' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'radius' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'timezone' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'clock_in' => [
                'type'       => 'TIME',
            ],
            'clock_out' => [
                'type'       => 'TIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('presence_locations');
    }

    public function down()
    {
        $this->forge->dropTable('presence_locations');
    }
}
