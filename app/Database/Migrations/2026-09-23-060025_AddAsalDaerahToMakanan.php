<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAsalDaerahToMakanan extends Migration
{
    public function up()
    {
        $this->forge->addColumn('makanan', [
            'asal_daerah' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Kota Jambi',
                'after'      => 'nama',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('makanan', 'asal_daerah');
    }
}
