<?php

namespace App\Controllers;

use App\Models\MakananModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Menu extends BaseController
{
    protected MakananModel $makananModel;

    public function __construct()
    {
        $this->makananModel = new MakananModel();
    }

    /**
     * Halaman Katalog Menu Lengkap dengan Live Sorting & Filter
     */
    public function index(): string
    {
        $kategori = $this->request->getGet('kategori');
        $keyword  = $this->request->getGet('q');
        $sort     = $this->request->getGet('sort') ?? 'terbaru';

        $menuList = $this->makananModel->getFilteredMenu($kategori, $keyword, $sort);

        $categories = [
            'Semua',
            'Menu Utama',
            'Lauk Tambahan',
            'Minuman',
        ];

        return view('menu/index', [
            'title'          => 'Katalog Menu Nasi Gemuk & Kuliner Jambi - Resto Triwiyatno',
            'menuList'       => $menuList,
            'categories'     => $categories,
            'activeKategori' => $kategori ?? 'Semua',
            'activeSort'     => $sort,
            'keyword'        => $keyword ?? '',
            'totalMenu'      => count($menuList),
        ]);
    }

    /**
     * Halaman Form Tambah Menu Baru (dengan Validasi Form CI4)
     */
    public function tambah(): string
    {
        return view('menu/form', [
            'title'   => 'Tambah Menu Kuliner Baru - Resto Triwiyatno',
            'makanan' => null,
        ]);
    }

    /**
     * Proses Simpan Menu Baru dengan VALIDASI FORM SERVER-SIDE CI4 & Upload Foto
     */
    public function simpan()
    {
        $rules = [
            'nama_makanan' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama makanan wajib diisi.',
                    'min_length' => 'Nama makanan minimal 3 karakter.',
                    'max_length' => 'Nama makanan maksimal 100 karakter.',
                ],
            ],
            'asal_daerah' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Asal daerah kuliner wajib diisi (contoh: Kota Jambi / Kerinci).',
                    'min_length' => 'Asal daerah minimal 3 karakter.',
                ],
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu kategori menu.',
                ],
            ],
            'harga' => [
                'rules'  => 'required|numeric|greater_than_equal_to[1000]',
                'errors' => [
                    'required'              => 'Harga makanan wajib diisi.',
                    'numeric'               => 'Harga hanya boleh berupa nominal angka.',
                    'greater_than_equal_to' => 'Harga minimal Rp 1.000.',
                ],
            ],
            'deskripsi_singkat' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi singkat rasa & bahan makanan wajib diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.',
                ],
            ],
            'gambar' => [
                'rules'  => 'max_size[gambar,4096]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar maksimal 4 MB.',
                    'is_image' => 'File yang diunggah harus berupa file gambar valid.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, atau WebP.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Handle Upload Gambar
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = 'nasi_gemuk_komplit.jpg'; // default fallback image

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads/makanan', $namaGambar);
        }

        // Generate Slug
        $slug = url_title($this->request->getPost('nama_makanan'), '-', true);
        $cekSlug = $this->makananModel->where('slug', $slug)->first();
        if ($cekSlug) {
            $slug .= '-' . time();
        }

        $this->makananModel->insert([
            'nama'        => $this->request->getPost('nama_makanan'),
            'asal_daerah' => $this->request->getPost('asal_daerah'),
            'slug'        => $slug,
            'kategori'    => $this->request->getPost('kategori'),
            'deskripsi'   => $this->request->getPost('deskripsi_singkat'),
            'harga'       => $this->request->getPost('harga'),
            'gambar'      => $namaGambar,
            'is_unggulan' => $this->request->getPost('is_unggulan') ? 1 : 0,
            'status'      => $this->request->getPost('status') ?? 'tersedia',
        ]);

        return redirect()->to('/menu')->with('success', 'Menu makanan baru berhasil ditambahkan ke katalog!');
    }

    /**
     * Halaman Edit Menu Makanan
     */
    public function ubah($id): string
    {
        $makanan = $this->makananModel->find($id);
        if (!$makanan) {
            throw PageNotFoundException::forPageNotFound('Menu tidak ditemukan');
        }

        return view('menu/form', [
            'title'   => 'Ubah Menu: ' . esc($makanan['nama']) . ' - Resto Triwiyatno',
            'makanan' => $makanan,
        ]);
    }

    /**
     * Proses Update Menu Makanan
     */
    public function update($id)
    {
        $makanan = $this->makananModel->find($id);
        if (!$makanan) {
            throw PageNotFoundException::forPageNotFound('Menu tidak ditemukan');
        }

        $rules = [
            'nama_makanan' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama makanan wajib diisi.',
                    'min_length' => 'Nama makanan minimal 3 karakter.',
                ],
            ],
            'asal_daerah' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Asal daerah kuliner wajib diisi.',
                ],
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu kategori menu.',
                ],
            ],
            'harga' => [
                'rules'  => 'required|numeric|greater_than_equal_to[1000]',
                'errors' => [
                    'required' => 'Harga makanan wajib diisi.',
                    'numeric'  => 'Harga hanya boleh berupa nominal angka.',
                ],
            ],
            'deskripsi_singkat' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi singkat wajib diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.',
                ],
            ],
            'gambar' => [
                'rules'  => 'max_size[gambar,4096]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar maksimal 4 MB.',
                    'is_image' => 'File yang diunggah harus berupa file gambar valid.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, atau WebP.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $namaGambar = $makanan['gambar'];
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads/makanan', $namaGambar);
        }

        $this->makananModel->update($id, [
            'nama'        => $this->request->getPost('nama_makanan'),
            'asal_daerah' => $this->request->getPost('asal_daerah'),
            'kategori'    => $this->request->getPost('kategori'),
            'deskripsi'   => $this->request->getPost('deskripsi_singkat'),
            'harga'       => $this->request->getPost('harga'),
            'gambar'      => $namaGambar,
            'is_unggulan' => $this->request->getPost('is_unggulan') ? 1 : 0,
            'status'      => $this->request->getPost('status') ?? 'tersedia',
        ]);

        return redirect()->to('/menu')->with('success', 'Data menu berhasil diperbarui!');
    }

    /**
     * Proses Hapus Menu Makanan
     */
    public function hapus($id)
    {
        $makanan = $this->makananModel->find($id);
        if (!$makanan) {
            throw PageNotFoundException::forPageNotFound('Menu tidak ditemukan');
        }

        $this->makananModel->delete($id);

        return redirect()->to('/menu')->with('success', 'Menu "' . esc($makanan['nama']) . '" berhasil dihapus dari katalog.');
    }
}
