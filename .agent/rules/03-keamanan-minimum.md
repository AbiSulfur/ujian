---
trigger: always_on
---
# Keamanan Minimum (wajib, tapi jangan berlebihan)

1. Password: simpan dengan `password_hash($pw, PASSWORD_DEFAULT)`, cek dengan `password_verify()`. Jangan pernah simpan plain text.
2. Semua input divalidasi di server (`required`, `valid_email`, `is_unique`, `numeric`, dll).
3. Output di View selalu `esc()`. CSRF aktif (`csrf_field()` di setiap form POST).
4. Halaman yang butuh login dilindungi Filter, bukan cuma disembunyikan tombolnya.
5. Upload file: validasi `uploaded`, `max_size`, `ext_in`/`mime_in`, simpan dengan `getRandomName()`.
6. Jangan tampilkan `var_dump`/`dd()` di hasil akhir. Jangan commit `.env`.
7. Cukup itu saja. Jangan tambah fitur keamanan lain (2FA, rate limit, JWT, dll) kecuali diminta.
