<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MakananSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            [
                'nama'        => 'Nasi Gemuk Komplit Spesial',
                'asal_daerah' => 'Kota Jambi',
                'slug'        => 'nasi-gemuk-komplit-spesial',
                'kategori'    => 'Menu Utama',
                'deskripsi'   => 'Nasi gurih khas Jambi dimasak dengan santan kental, daun pandan, dan rempah pilihan. Disajikan komplit dengan suwiran ayam gurih, telur balado, sambal terasi khas Jambi, teri kacang renyah, mentimun segar, dan kerupuk.',
                'harga'       => 28000,
                'gambar'      => 'nasi_gemuk_komplit.jpg',
                'is_unggulan' => 1,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Nasi Gemuk Daging Rendang Jambi',
                'asal_daerah' => 'Kota Jambi',
                'slug'        => 'nasi-gemuk-daging-rendang-jambi',
                'kategori'    => 'Menu Utama',
                'deskripsi'   => 'Nasi gemuk gurih hangat dipadukan dengan potongan daging sapi rendang empuk berbalur bumbu rempah pekat khas Jambi, disajikan dengan telur balado dan kerupuk.',
                'harga'       => 35000,
                'gambar'      => 'nasi_gemuk_rendang.jpg',
                'is_unggulan' => 1,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Nasi Gemuk Ayam Lengkuas Rempah',
                'asal_daerah' => 'Danau Sipin, Jambi',
                'slug'        => 'nasi-gemuk-ayam-lengkuas-rempah',
                'kategori'    => 'Menu Utama',
                'deskripsi'   => 'Nasi gemuk istimewa dengan ayam goreng bertabur serundeng lengkuas garing aromatik, sambal merah terasi, dan lalapan segar.',
                'harga'       => 30000,
                'gambar'      => 'nasi_gemuk_ayam.jpg',
                'is_unggulan' => 1,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Nasi Gemuk Telur Balado Gurih',
                'asal_daerah' => 'Seberang Kota Jambi',
                'slug'        => 'nasi-gemuk-telur-balado-gurih',
                'kategori'    => 'Menu Utama',
                'deskripsi'   => 'Menu sarapan otentik Jambi terfavorit. Nasi gemuk dengan sebutir telur balado pedas manis gurih, teri kacang asin, mentimun dan sambal.',
                'harga'       => 20000,
                'gambar'      => 'nasi_gemuk_telur.jpg',
                'is_unggulan' => 0,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Nasi Gemuk Ikan Asin Balado Crispy',
                'asal_daerah' => 'Muaro Jambi',
                'slug'        => 'nasi-gemuk-ikan-asin-balado-crispy',
                'kategori'    => 'Menu Utama',
                'deskripsi'   => 'Nasi gemuk khas Jambi dengan lauk ikan asin crispy berbumbu balado gurih pedas nendang, ditemani telur dadar iris dan kerupuk.',
                'harga'       => 24000,
                'gambar'      => 'nasi_gemuk_ikan_asin.jpg',
                'is_unggulan' => 0,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Lontong Sayur Kuah Santan Jambi',
                'asal_daerah' => 'Kota Jambi',
                'slug'        => 'lontong-sayur-kuah-santan-jambi',
                'kategori'    => 'Menu Utama',
                'deskripsi'   => 'Lontong lembut berkuah santan gurih khas tanah Melayu Jambi dengan sayur labu siam, tahu, tempe, serta telur rebus berbumbu sedap.',
                'harga'       => 22000,
                'gambar'      => 'lontong_sayur_jambi.jpg',
                'is_unggulan' => 0,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Gulai Tepek Ikan Khas Jambi',
                'asal_daerah' => 'Jambi Kota Seberang',
                'slug'        => 'gulai-tepek-ikan-khas-jambi',
                'kategori'    => 'Lauk Tambahan',
                'deskripsi'   => 'Kuliner legendaris Jambi berbahan adonan ikan gabus kenyal lembut yang dimasak dalam kuah gulai santan kuning berempah nan gurih sedap.',
                'harga'       => 27000,
                'gambar'      => 'gulai_tepek_ikan.jpg',
                'is_unggulan' => 1,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Es Teh Kayu Manis Koja Kerinci',
                'asal_daerah' => 'Kerinci, Jambi',
                'slug'        => 'es-teh-kayu-manis-koja-kerinci',
                'kategori'    => 'Minuman',
                'deskripsi'   => 'Minuman penyegar aromatik dari racikan seduhan teh berkualitas dengan aroma manis rempah kayu manis Koja khas dataran tinggi Kerinci Jambi.',
                'harga'       => 12000,
                'gambar'      => 'es_teh_kayu_manis.jpg',
                'is_unggulan' => 0,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama'        => 'Kopi Jangkat Robusta Hangat',
                'asal_daerah' => 'Merangin, Jambi',
                'slug'        => 'kopi-jangkat-robusta-hangat',
                'kategori'    => 'Minuman',
                'deskripsi'   => 'Kopi robusta asli lereng Gunung Masurai Jangkat Jambi yang disangrai sempurna, menghasilkan cita rasa kopi pekat berkarakter unik.',
                'harga'       => 15000,
                'gambar'      => 'kopi_jangkat.jpg',
                'is_unggulan' => 0,
                'status'      => 'tersedia',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        // Update or insert records
        foreach ($data as $item) {
            $existing = $this->db->table('makanan')->where('slug', $item['slug'])->get()->getRow();
            if ($existing) {
                $this->db->table('makanan')->where('id', $existing->id)->update($item);
            } else {
                $this->db->table('makanan')->insert($item);
            }
        }
    }
}
