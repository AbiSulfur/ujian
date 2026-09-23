---
name: ci4-debug
description: Dipakai saat ada error, halaman blank, 404, 403 CSRF, error koneksi database, atau data tidak tersimpan di aplikasi CodeIgniter 4 + MySQL. Berisi checklist perbaikan minimal.
---
# Skill: Debug CI4 (perbaiki seminimal mungkin)

Prinsip: cari akar masalah, ubah sesedikit mungkin. JANGAN menulis ulang fitur, mengganti arsitektur, atau mengubah file yang tidak terkait.

## Langkah awal
1. Baca pesan error lengkap (halaman Whoops jika `CI_ENVIRONMENT = development`, atau `writable/logs/log-*.log`).
2. Sebutkan penyebab dalam 1 kalimat, baru perbaiki.
3. Tes ulang fitur yang sama, lalu berhenti.

## Gejala dan penyebab umum
| Gejala | Cek |
|---|---|
| 404 Page Not Found | `Routes.php` (method GET/POST, nama Controller::method), huruf besar/kecil nama class, `app.baseURL` di `.env` |
| "The action you requested is not allowed" (403) | Form POST belum ada `csrf_field()` |
| Data tidak tersimpan, tanpa error | Kolom belum masuk `$allowedFields`, atau validasi gagal tapi error tidak ditampilkan |
| Unable to connect / Access denied | `.env` bagian `database.default.*`, MySQL/XAMPP sudah jalan, database sudah dibuat |
| Unknown column / Table doesn't exist | `php spark migrate:status`, jalankan `php spark migrate`, cocokkan nama kolom di Model, View, migration |
| Class "..." not found | Namespace, nama file = nama class, `use` statement, lalu `composer dump-autoload` |
| Foreign key constraint fails | Urutan migration, data induk belum ada, tipe kolom FK harus sama persis (unsigned) dengan PK |
| Halaman putih | Set `CI_ENVIRONMENT = development`, cek log di `writable/logs` |
| Session/flashdata hilang | Folder `writable/session` bisa ditulis, tidak ada output (echo/spasi) sebelum redirect |
| Perubahan tidak muncul | `php spark cache:clear`, hard refresh browser |
| Upload gagal | `enctype="multipart/form-data"`, folder tujuan ada dan bisa ditulis, batas `upload_max_filesize` di php.ini |
