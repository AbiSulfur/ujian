<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReservasiTable extends Migration
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
            'nama_pemesan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_whatsapp' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'makanan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'jumlah_porsi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'tanggal_kunjungan' => [
                'type' => 'DATE',
            ],
            'jam_kunjungan' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'default'    => '12:00',
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'default'    => 'Diterima',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reservasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('reservasi', true);
    }
}
