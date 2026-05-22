<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDepartemenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'nama_departemen' => ['type' => 'VARCHAR', 'constraint' => 100],
            'lokasi'          => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('departemen');
    }

    public function down()
    {
        $this->forge->dropTable('departemen');
    }
}
