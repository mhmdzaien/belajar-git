<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TbMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '1',
            ],
            'semester_masuk' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'prodi_id' => [
                'type' => 'INT',
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
        $this->forge->addPrimaryKey('nim');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable("mahasiswa");
    }
}
