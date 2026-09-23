<?php

namespace App\Controllers;

use App\Models\MakananModel;
use App\Models\ReservasiModel;

class Reservasi extends BaseController
{
    protected ReservasiModel $reservasiModel;
    protected MakananModel $makananModel;

    public function __construct()
    {
        $this->reservasiModel = new ReservasiModel();
        $this->makananModel   = new MakananModel();
    }

    /**
     * Tampilan Halaman Form Reservasi Meja & Pemesanan Menu Nasi Gemuk
     */
    public function index(): string
    {
        $makananList = $this->makananModel->where('status', 'tersedia')->orderBy('nama', 'ASC')->findAll();
        $selectedMenu = $this->request->getGet('menu');

        return view('reservasi/index', [
            'title'        => 'Form Reservasi & Pemesanan - Resto Triwiyatno Jambi',
            'makananList'  => $makananList,
            'selectedMenu' => $selectedMenu,
        ]);
    }

    /**
     * Memproses submit form reservasi dengan VALIDASI SERVER-SIDE CI4 yang ketat
     */
    public function store()
    {
        $rules = [
            'nama_pemesan' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama pemesan wajib diisi.',
                    'min_length' => 'Nama pemesan minimal harus 3 karakter.',
                    'max_length' => 'Nama pemesan maksimal 100 karakter.',
                ],
            ],
            'no_whatsapp' => [
                'rules'  => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required'   => 'Nomor WhatsApp wajib diisi.',
                    'numeric'    => 'Nomor WhatsApp hanya boleh berisi angka.',
                    'min_length' => 'Nomor WhatsApp minimal 10 digit angka.',
                    'max_length' => 'Nomor WhatsApp maksimal 15 digit angka.',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required'    => 'Alamat email wajib diisi.',
                    'valid_email' => 'Format alamat email tidak valid (contoh: nama@domain.com).',
                ],
            ],
            'makanan_id' => [
                'rules'  => 'required|is_not_unique[makanan.id]',
                'errors' => [
                    'required'      => 'Silakan pilih varian menu kuliner khas Jambi.',
                    'is_not_unique' => 'Pilihan menu tidak ditemukan dalam database.',
                ],
            ],
            'jumlah_porsi' => [
                'rules'  => 'required|integer|greater_than[0]|less_than_equal_to[100]',
                'errors' => [
                    'required'              => 'Jumlah porsi wajib diisi.',
                    'integer'               => 'Jumlah porsi harus berupa bilangan bulat.',
                    'greater_than'          => 'Jumlah pemesanan minimal 1 porsi.',
                    'less_than_equal_to'    => 'Pemesanan maksimal 100 porsi per reservasi.',
                ],
            ],
            'tanggal_kunjungan' => [
                'rules'  => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required'   => 'Tanggal kunjungan/pemesanan wajib dipilih.',
                    'valid_date' => 'Format tanggal kunjungan tidak valid.',
                ],
            ],
            'jam_kunjungan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jam kunjungan wajib dipilih.',
                ],
            ],
        ];

        // Jalankan Validasi CI4
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Data terverifikasi valid, simpan ke database
        $makanan = $this->makananModel->find($this->request->getPost('makanan_id'));

        $data = [
            'nama_pemesan'      => $this->request->getPost('nama_pemesan'),
            'no_whatsapp'       => $this->request->getPost('no_whatsapp'),
            'email'             => $this->request->getPost('email'),
            'makanan_id'        => $this->request->getPost('makanan_id'),
            'jumlah_porsi'      => (int) $this->request->getPost('jumlah_porsi'),
            'tanggal_kunjungan' => $this->request->getPost('tanggal_kunjungan'),
            'jam_kunjungan'     => $this->request->getPost('jam_kunjungan'),
            'catatan'           => $this->request->getPost('catatan'),
            'status'            => 'Diterima',
        ];

        $this->reservasiModel->insert($data);

        $totalEstimasi = ($makanan['harga'] ?? 0) * $data['jumlah_porsi'];

        return redirect()->to('/reservasi/sukses')
            ->with('success', 'Reservasi & Pesanan Anda berhasil dicatat!')
            ->with('reservasi_data', [
                'nama'     => $data['nama_pemesan'],
                'menu'     => $makanan['nama'] ?? 'Menu Khas Jambi',
                'porsi'    => $data['jumlah_porsi'],
                'tanggal'  => $data['tanggal_kunjungan'],
                'jam'      => $data['jam_kunjungan'],
                'total'    => $totalEstimasi,
                'whatsapp' => $data['no_whatsapp'],
            ]);
    }

    /**
     * Halaman Konfirmasi Sukses Reservasi
     */
    public function sukses(): string
    {
        $reservasiData = session()->getFlashdata('reservasi_data');

        return view('reservasi/sukses', [
            'title' => 'Reservasi Berhasil - Resto Triwiyatno',
            'data'  => $reservasiData,
        ]);
    }

    /**
     * Halaman Daftar Riwayat Reservasi Masuk (Company Profile internal review)
     */
    public function riwayat(): string
    {
        $reservasiList = $this->reservasiModel->getReservasiWithMenu();

        return view('reservasi/riwayat', [
            'title'     => 'Daftar Reservasi Masuk - Resto Triwiyatno',
            'reservasi' => $reservasiList,
        ]);
    }
}
