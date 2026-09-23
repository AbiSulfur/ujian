---
name: ci4-crud-feature
description: Dipakai saat diminta membuat fitur CRUD (tambah, lihat, ubah, hapus data) di CodeIgniter 4 + MySQL. Berisi urutan kerja dan template Model, Controller, Route, dan View.
---
# Skill: CRUD di CI4

Ganti `Produk`/`produk` dengan nama modul dari soal. Kerjakan berurutan, jangan lompat.

## Urutan
1. Migration tabel (lihat skill `ci4-migration-seeder`) lalu `php spark migrate`
2. Model
3. Controller
4. Route
5. View (`index`, `form` untuk tambah dan ubah)
6. Tes: tambah, lihat, ubah, hapus, dan coba submit form kosong (validasi harus muncul)

## Model `app/Models/ProdukModel.php`
```php
<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table         = 'produk';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['nama', 'harga'];
    protected $useTimestamps = true;
}
```

## Controller `app/Controllers/Produk.php`
```php
<?php
namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Produk extends BaseController
{
    protected ProdukModel $model;
    protected array $rules = [
        'nama'  => 'required|min_length[3]|max_length[100]',
        'harga' => 'required|numeric',
    ];

    public function __construct()
    {
        $this->model = new ProdukModel();
    }

    public function index()
    {
        return view('produk/index', [
            'title'  => 'Data Produk',
            'produk' => $this->model->orderBy('id', 'DESC')->paginate(10),
            'pager'  => $this->model->pager,
        ]);
    }

    public function create()
    {
        return view('produk/form', ['title' => 'Tambah Produk', 'row' => null]);
    }

    public function store()
    {
        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->insert($this->request->getPost(['nama', 'harga']));
        return redirect()->to('/produk')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $row = $this->model->find($id) ?? throw PageNotFoundException::forPageNotFound();
        return view('produk/form', ['title' => 'Ubah Produk', 'row' => $row]);
    }

    public function update($id)
    {
        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->update($id, $this->request->getPost(['nama', 'harga']));
        return redirect()->to('/produk')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/produk')->with('success', 'Data berhasil dihapus');
    }
}
```

## Route `app/Config/Routes.php`
```php
$routes->group('produk', function ($routes) {
    $routes->get('/', 'Produk::index');
    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');
    $routes->get('edit/(:num)', 'Produk::edit/$1');
    $routes->post('update/(:num)', 'Produk::update/$1');
    $routes->post('delete/(:num)', 'Produk::delete/$1');
});
```

## Layout `app/Views/layouts/main.php` (buat jika belum ada)
```php
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Aplikasi') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
  <?php endif ?>
  <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger"><ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $e): ?><li><?= esc($e) ?></li><?php endforeach ?>
    </ul></div>
  <?php endif ?>
  <?= $this->renderSection('content') ?>
</div>
</body>
</html>
```
(Jika ujian offline, ganti link Bootstrap dengan CSS lokal di `public/css/style.css`.)

## View `app/Views/produk/index.php`
```php
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3><?= esc($title) ?></h3>
<a href="<?= base_url('produk/create') ?>" class="btn btn-primary mb-3">Tambah</a>
<table class="table table-bordered">
  <thead><tr><th>No</th><th>Nama</th><th>Harga</th><th>Aksi</th></tr></thead>
  <tbody>
  <?php foreach ($produk as $i => $p): ?>
    <tr>
      <td><?= $i + 1 ?></td>
      <td><?= esc($p['nama']) ?></td>
      <td><?= number_format($p['harga'], 0, ',', '.') ?></td>
      <td>
        <a href="<?= base_url('produk/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
        <form action="<?= base_url('produk/delete/' . $p['id']) ?>" method="post" class="d-inline"
              onsubmit="return confirm('Hapus data ini?')">
          <?= csrf_field() ?>
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>
<?= $pager->links() ?>
<?= $this->endSection() ?>
```

## View `app/Views/produk/form.php`
```php
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3><?= esc($title) ?></h3>
<form action="<?= base_url($row ? 'produk/update/' . $row['id'] : 'produk/store') ?>" method="post">
  <?= csrf_field() ?>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= esc(old('nama', $row['nama'] ?? '')) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="harga" class="form-control" value="<?= esc(old('harga', $row['harga'] ?? '')) ?>">
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>
```
