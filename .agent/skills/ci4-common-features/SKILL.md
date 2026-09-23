---
name: ci4-common-features
description: Dipakai untuk fitur tambahan yang sering muncul di soal ujian CI4 + MySQL - pencarian, filter, pagination, relasi/join tabel, upload file, cetak/export CSV, dan dashboard statistik sederhana.
---
# Skill: Fitur Umum CI4

Pakai potongan yang relevan saja. Jangan menambah fitur yang tidak diminta.

## Pencarian dan filter (di Controller)
```php
$keyword = $this->request->getGet('q');
$builder = $this->model;
if ($keyword) {
    $builder = $builder->groupStart()->like('nama', $keyword)->orLike('kode', $keyword)->groupEnd();
}
$data['produk'] = $builder->paginate(10);
$data['pager']  = $this->model->pager;
```
Form pencarian pakai `method="get"` (tidak perlu CSRF).

## Relasi / join
```php
// di Model
public function withKategori()
{
    return $this->select('produk.*, kategori.nama AS kategori_nama')
                ->join('kategori', 'kategori.id = produk.kategori_id', 'left');
}
// di Controller
$data['produk'] = $this->model->withKategori()->paginate(10);
```
Dropdown relasi di form: ambil semua kategori dari `KategoriModel->findAll()`, tampilkan `<select>` dan tandai `selected` jika sama dengan `old()` / data lama.

## Upload file (gambar)
```php
$file = $this->request->getFile('foto');
$rules = ['foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'];
if (! $this->validate($rules)) { /* redirect back dengan errors */ }

$namaBaru = $file->getRandomName();
$file->move(FCPATH . 'uploads', $namaBaru);   // simpan $namaBaru ke database
```
Form wajib `enctype="multipart/form-data"`. Tampilkan: `<img src="<?= base_url('uploads/' . esc($row['foto'])) ?>">`. Saat ubah/hapus data, hapus file lama dengan `unlink()` jika ada.
Jika foto opsional saat ubah data, pakai rule `permit_empty|max_size[...]|is_image[...]` dan cek `$file->isValid()` sebelum memindahkan.

## Dashboard statistik sederhana
```php
$data['total_produk'] = $this->produkModel->countAllResults();
$data['total_harga']  = $this->produkModel->selectSum('harga')->first()['harga'] ?? 0;
```

## Export CSV / cetak
```php
$rows = $this->model->findAll();
$out  = fopen('php://temp', 'r+');
fputcsv($out, ['ID', 'Nama', 'Harga']);
foreach ($rows as $r) { fputcsv($out, [$r['id'], $r['nama'], $r['harga']]); }
rewind($out);
return $this->response
    ->setHeader('Content-Type', 'text/csv')
    ->setHeader('Content-Disposition', 'attachment; filename="produk.csv"')
    ->setBody(stream_get_contents($out));
```
Cetak: buat view sederhana berisi tabel lalu tombol `window.print()`. Jangan pasang library PDF kecuali diminta.

## Soft delete
Di Model set `protected $useSoftDeletes = true;` dan `protected $deletedField = 'deleted_at';` (tambahkan kolom `deleted_at` DATETIME NULL lewat migration).
