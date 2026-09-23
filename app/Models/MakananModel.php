<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table            = 'makanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'asal_daerah',
        'slug',
        'kategori',
        'deskripsi',
        'harga',
        'gambar',
        'is_unggulan',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Mengambil daftar makanan dengan fitur filter kategori, pencarian, dan sorting
     */
    public function getFilteredMenu(?string $kategori = null, ?string $keyword = null, ?string $sort = null)
    {
        $builder = $this;

        // Filter Kategori
        if (!empty($kategori) && strtolower($kategori) !== 'semua') {
            $builder = $builder->where('kategori', $kategori);
        }

        // Pencarian Keyword
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('nama', $keyword)
                ->orLike('deskripsi', $keyword)
                ->orLike('asal_daerah', $keyword)
                ->groupEnd();
        }

        // Fitur Sorting
        switch ($sort) {
            case 'termurah':
            case 'harga_asc':
                $builder = $builder->orderBy('harga', 'ASC');
                break;
            case 'termahal':
            case 'harga_desc':
                $builder = $builder->orderBy('harga', 'DESC');
                break;
            case 'nama_asc':
                $builder = $builder->orderBy('nama', 'ASC');
                break;
            case 'nama_desc':
                $builder = $builder->orderBy('nama', 'DESC');
                break;
            case 'unggulan':
            case 'populer':
                $builder = $builder->orderBy('is_unggulan', 'DESC')->orderBy('id', 'DESC');
                break;
            case 'terlama':
                $builder = $builder->orderBy('id', 'ASC');
                break;
            case 'terbaru':
            default:
                $builder = $builder->orderBy('id', 'DESC');
                break;
        }

        return $builder->findAll();
    }

    /**
     * Mengambil menu unggulan untuk highlight di homepage
     */
    public function getUnggulan(int $limit = 4)
    {
        return $this->where('is_unggulan', 1)
            ->where('status', 'tersedia')
            ->orderBy('id', 'DESC')
            ->findAll($limit);
    }

    /**
     * Mengambil menu berdasarkan slug atau ID
     */
    public function getBySlugOrId($param)
    {
        if (is_numeric($param)) {
            $item = $this->find($param);
            if ($item) {
                return $item;
            }
        }
        return $this->where('slug', $param)->first();
    }
}
