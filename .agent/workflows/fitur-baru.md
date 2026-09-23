---
description: Alur standar membuat satu fitur baru CI4 + MySQL dengan cepat dan tanpa ngelantur
---
# /fitur-baru

Input dari user: nama fitur dan kebutuhannya. Ikuti langkah ini persis.

1. Baca struktur project (`Routes.php`, `app/Models`, `app/Controllers`, `.env`) dan cek koneksi database lewat `php spark migrate:status`.
2. Tulis rencana MAKSIMAL 5 baris: tabel/kolom, file yang dibuat, route. Lanjut tanpa menunggu persetujuan kecuali ada risiko menghapus data.
3. Migration lalu `php spark migrate`.
4. Model, Controller, Route, View (gunakan skill `ci4-crud-feature` atau skill lain yang relevan).
5. Tes alur utama dan validasi form kosong.
6. Tampilkan ringkasan: file dibuat/diubah, URL tes, langkah tes. STOP di sini, jangan mulai fitur lain.
