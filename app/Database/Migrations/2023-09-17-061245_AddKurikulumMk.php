<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKurikulumMk extends Migration
{
    public function up()
    {
        $this->forge->addColumn('matakuliah',[    'kurikulum_id' => [
            'type' => 'INT',
        ]]);
    }

    public function down()
    {
        $this->forge->dropColumn("matakuliah","kurikulum_id");
    }
}
