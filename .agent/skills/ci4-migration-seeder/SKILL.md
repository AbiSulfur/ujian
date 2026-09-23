---
name: ci4-migration-seeder
description: Dipakai saat perlu membuat atau mengubah tabel MySQL di CodeIgniter 4 lewat migration, menambah relasi foreign key, atau mengisi data dummy dengan seeder.
---
# Skill: Migration dan Seeder CI4

## Langkah
1. `php spark make:migration CreateProdukTable`
2. Isi `up()` dan `down()`
3. `php spark migrate` (cek dengan `php spark migrate:status`)
4. Jika butuh data awal: `php spark make:seeder ProdukSeeder`, lalu `php spark db:seed ProdukSeeder`

## Template migration
```php
<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdukTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kategori_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'nama'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'harga'       => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        // addForeignKey(kolom, tabel_tujuan, kolom_tujuan, onUpdate, onDelete)
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('produk', true);
    }

    public function down()
    {
        $this->forge->dropTable('produk', true);
    }
}
```
Catatan: tabel yang jadi tujuan foreign key HARUS dimigrasi lebih dulu (timestamp nama file lebih kecil).

## Template seeder
```php
<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('produk')->insertBatch([
            ['nama' => 'Contoh A', 'harga' => 10000, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Contoh B', 'harga' => 25000, 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
```

## Ubah tabel yang sudah ada
Buat migration BARU (`AddStokToProdukTable`) dengan `$this->forge->addColumn('produk', [...])`. Jangan edit migration lama yang sudah dijalankan.
