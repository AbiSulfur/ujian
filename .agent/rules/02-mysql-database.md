---
trigger: always_on
---
# Aturan Database MySQL

1. Driver: `MySQLi`, engine InnoDB, charset `utf8mb4`. Setting koneksi di `.env`:
   `database.default.hostname`, `.database`, `.username`, `.password`, `.DBDriver = MySQLi`, `.port = 3306`.
2. Semua perubahan struktur database lewat **migration** (`php spark make:migration`), bukan edit manual di phpMyAdmin. Pengecualian: kalau soal memberi file `.sql`, import file itu apa adanya lalu jangan ubah strukturnya kecuali diminta.
3. Setiap tabel: PK `id` (INT UNSIGNED AUTO_INCREMENT), plus `created_at` dan `updated_at` (DATETIME NULL).
4. Relasi pakai foreign key dengan `onUpdate`/`onDelete` yang jelas.
5. Semua query lewat Model atau Query Builder. Dilarang menyambung string input user ke SQL (`"... WHERE id = $id"`). Jika terpaksa raw query, pakai binding: `$db->query($sql, [$id])`.
6. Data dummy lewat Seeder (`php spark make:seeder`), jalankan dengan `php spark db:seed NamaSeeder`.
7. Jangan `TRUNCATE`, `DROP`, atau `migrate:refresh` tanpa konfirmasi user. Cek status dulu dengan `php spark migrate:status`.
8. Nama tabel/kolom ikuti soal ujian. Kalau soal tidak menyebut, pakai snake_case bahasa Indonesia yang singkat dan konsisten.
