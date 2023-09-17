<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TbMatakuliah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'INT',
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'sks' => [
                'type'       => 'INT',
            ],
            'semester' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('matakuliah');
    }

    public function down()
    {
        $this->forge->dropTable("matakuliah");
    }
}
