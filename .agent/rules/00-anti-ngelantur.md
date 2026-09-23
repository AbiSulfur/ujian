---
trigger: always_on
---

# Aturan Utama: Jangan Ngelantur (Mode Ujian)

Konteks: ujian praktik sekolah, waktu terbatas, dikerjakan di ruangan.
Stack WAJIB: **CodeIgniter 4 (PHP) + MySQL**. Tidak boleh diganti.

## Scope
1. Kerjakan HANYA yang diminta di prompt terakhir. Jangan menambah fitur, halaman, tabel, kolom, atau library di luar permintaan.
2. Jangan refactor, rename, pindah, atau hapus file yang tidak berkaitan dengan tugas.
3. Dilarang ganti stack: tidak boleh Laravel, Node/Express, React/Vue/Next, ORM lain, SQLite/PostgreSQL.
4. Frontend cukup: CI4 View (PHP) + HTML + Tailwind CSS (Via CDN).
5. Jangan install package (composer/npm) kecuali diminta eksplisit.
6. Jangan jalankan perintah destruktif tanpa konfirmasi user: `migrate:refresh`, `migrate:rollback`, `DROP DATABASE/TABLE`, `TRUNCATE`, `rm -rf`, `git reset --hard`.
7. Jangan buat README, dokumentasi, unit test, atau file demo kecuali diminta.

## Cara kerja
1. Sebelum menulis kode, baca dulu struktur yang sudah ada (`app/Controllers`, `app/Models`, `app/Views`, `app/Config/Routes.php`, `.env`) supaya gaya kode konsisten.
2. Kalau permintaan ambigu: pilih interpretasi PALING SEDERHANA, tulis asumsinya 1 baris, lalu lanjut. Tanya maksimal 6 pertanyaan, hanya jika benar-benar buntu.
3. Ikuti nama tabel/kolom/fitur persis seperti yang tertulis di soal ujian atau dari instruksiku. Jangan ganti bahasa atau gaya penamaan.
4. Satu permintaan = satu fitur. Selesai satu fitur, BERHENTI. Jangan lanjut ke fitur berikutnya sendiri.
5. Prioritas: fitur jalan dulu > validasi > tampilan rapi. Jangan habiskan waktu di styling.

## Format jawaban
- Bahasa Indonesia, singkat, tanpa basa-basi.
- Setelah selesai tulis ringkasan pendek: (a) file yang dibuat/diubah, (b) URL untuk dites, (c) langkah tes 2-3 poin.
- Kode diberi komentar pendek seperlunya.