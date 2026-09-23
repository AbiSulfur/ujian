---
description: Checklist akhir sebelum project ujian dikumpulkan
---
# /cek-sebelum-kumpul

Hanya MEMERIKSA dan melaporkan. Perbaiki hanya bug yang merusak fitur soal, jangan tambah fitur baru.

1. `php spark migrate:status` semua migration berstatus sudah dijalankan.
2. Semua fitur yang tertulis di soal: buka satu per satu, tandai jalan / tidak jalan.
3. Form: validasi kosong muncul, data tersimpan, ubah dan hapus berfungsi.
4. Halaman yang perlu login tidak bisa dibuka tanpa login.
5. Cari sisa `var_dump`, `dd(`, `print_r`, dan teks placeholder ("test", "lorem").
6. `CI_ENVIRONMENT` dan setting `.env` sesuai permintaan pengawas/soal.
7. Jika soal meminta ekspor database: `mysqldump -u root nama_db > nama_db.sql`.
8. Laporkan daftar fitur beserta statusnya dalam tabel singkat.
