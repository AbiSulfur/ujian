<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $table            = 'reservasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_pemesan',
        'no_whatsapp',
        'email',
        'makanan_id',
        'jumlah_porsi',
        'tanggal_kunjungan',
        'jam_kunjungan',
        'catatan',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Mengambil data reservasi beserta informasi makanan yang dipilih
     */
    public function getReservasiWithMenu()
    {
        return $this->select('reservasi.*, makanan.nama as nama_makanan, makanan.harga as harga_makanan')
            ->join('makanan', 'makanan.id = reservasi.makanan_id', 'left')
            ->orderBy('reservasi.id', 'DESC')
            ->findAll();
    }
}
