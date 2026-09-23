<?php

namespace App\Controllers;

use App\Models\MakananModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    protected MakananModel $makananModel;

    public function __construct()
    {
        $this->makananModel = new MakananModel();
    }

    /**
     * Homepage Company Profile Resto Triwiyatno
     * Menampilkan Hero Nasi Gemuk, Keunggulan, Menu Unggulan,
     * serta Katalog Menu Lengkap dengan Fitur Sorting, Filter, dan Search.
     */
    public function index(): string
    {
        $kategori = $this->request->getGet('kategori');
        $keyword  = $this->request->getGet('q');
        $sort     = $this->request->getGet('sort') ?? 'unggulan';

        $menuList     = $this->makananModel->getFilteredMenu($kategori, $keyword, $sort);
        $menuUnggulan = $this->makananModel->getUnggulan(3);

        $categories = [
            'Semua',
            'Menu Utama',
            'Lauk Tambahan',
            'Minuman',
        ];

        return view('home/index', [
            'title'          => 'Resto Triwiyatno - Sensasi Nasi Gemuk Otentik Khas Jambi',
            'menuList'       => $menuList,
            'menuUnggulan'   => $menuUnggulan,
            'categories'     => $categories,
            'activeKategori' => $kategori ?? 'Semua',
            'activeSort'     => $sort,
            'keyword'        => $keyword ?? '',
            'totalMenu'      => count($menuList),
        ]);
    }

    /**
     * Halaman Detail Makanan Khas Jambi
     */
    public function detail($slugOrId): string
    {
        $makanan = $this->makananModel->getBySlugOrId($slugOrId);

        if (!$makanan) {
            throw PageNotFoundException::forPageNotFound('Menu makanan tidak ditemukan');
        }

        // Ambil menu terkait (rekomendasi)
        $terkait = $this->makananModel
            ->where('id !=', $makanan['id'])
            ->where('kategori', $makanan['kategori'])
            ->findAll(3);

        if (empty($terkait)) {
            $terkait = $this->makananModel
                ->where('id !=', $makanan['id'])
                ->findAll(3);
        }

        return view('home/detail', [
            'title'   => esc($makanan['nama']) . ' - Resto Triwiyatno Jambi',
            'makanan' => $makanan,
            'terkait' => $terkait,
        ]);
    }

    /**
     * Halaman Profil / Tentang Resto Triwiyatno & Budaya Kuliner Jambi
     */
    public function tentang(): string
    {
        return view('home/tentang', [
            'title' => 'Tentang Kami - Cerita Resto Triwiyatno & Nasi Gemuk Jambi',
        ]);
    }
}
