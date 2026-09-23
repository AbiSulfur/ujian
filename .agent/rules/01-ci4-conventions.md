---
trigger: always_on
---
# Konvensi CodeIgniter 4

Ini CI4, BUKAN CI3. Dilarang pakai sintaks CI3: `$this->load->model()`, `$this->input->post()`, `CI_Controller`, `defined('BASEPATH')`, `$this->db->get()` gaya lama.
Cek versi dengan `php spark --version` atau `composer.json` bila ragu.

## Struktur
- Controller: `app/Controllers/` (extends `BaseController`, namespace `App\Controllers`)
- Model: `app/Models/` (extends `CodeIgniter\Model`)
- View: `app/Views/<modul>/`, layout di `app/Views/layouts/main.php`
- Route: `app/Config/Routes.php`
- Migration/Seeder: `app/Database/Migrations`, `app/Database/Seeds`
- Nama file = nama class (PascalCase). Model: `NamaModel`. Tabel/kolom: snake_case.

## Aturan kode
1. Controller tipis: validasi, panggil Model, return view/redirect. Query ke database ditaruh di Model.
2. Model wajib isi `$table`, `$primaryKey`, `$allowedFields`, `$useTimestamps`, `$returnType`.
3. Route ditulis eksplisit di `Routes.php` (pakai `$routes->group`). Jangan bergantung pada auto-routing.
4. Validasi pakai `$this->validate($rules)`. Jika gagal: `redirect()->back()->withInput()->with('errors', $this->validator->getErrors())`.
5. Di View: output selalu `esc()`, form selalu `csrf_field()`, isi ulang input dengan `old('field')`.
6. Aksi ubah data (simpan/update/hapus) pakai method POST, bukan GET.
7. Notifikasi pakai flashdata (`->with('success', '...')`) lalu tampilkan di layout.
8. Konfigurasi database dan environment ada di `.env`, bukan hardcode di `Config/Database.php`. Saat ujian: `CI_ENVIRONMENT = development`.
9. Helper `form` dan `url` di-load lewat `$helpers` di `BaseController`.
10. Pagination: `$model->paginate(10)` + `$model->pager->links()`.
