<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-16 bg-amber-50/30">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl border-2 border-brand-accent shadow-hard-lg p-8 sm:p-12 text-center space-y-6">
            
            <div class="w-20 h-20 rounded-3xl bg-brand-primary border-2 border-brand-accent flex items-center justify-center text-4xl shadow-hard mx-auto text-brand-accent">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div class="space-y-2">
                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold border border-emerald-300">
                    Validasi Form Berhasil & Data Tersimpan
                </span>
                <h1 class="font-display font-black text-3xl sm:text-4xl text-brand-accent">
                    RESERVASI BERHASIL DITERIMA!
                </h1>
                <p class="text-sm text-gray-600 font-medium">
                    Terima kasih telah mempercayakan santap kuliner Anda di <strong>Resto Triwiyatno</strong>. Meja dan hidangan Nasi Gemuk Anda akan kami siapkan hangat tepat waktu.
                </p>
            </div>

            <?php if (!empty($data)): ?>
                <!-- Ringkasan Data Reservasi -->
                <div class="p-6 rounded-2xl bg-amber-50/60 border-2 border-brand-accent/20 text-left space-y-3">
                    <h3 class="font-display font-bold text-sm text-brand-accent uppercase tracking-wider border-b border-gray-200 pb-2">
                        Rincian Pesanan:
                    </h3>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <span class="text-gray-500 font-semibold">Nama Pemesan:</span>
                        <span class="font-bold text-brand-accent"><?= esc($data['nama']) ?></span>

                        <span class="text-gray-500 font-semibold">Menu Dipilih:</span>
                        <span class="font-bold text-brand-accent"><?= esc($data['menu']) ?></span>

                        <span class="text-gray-500 font-semibold">Jumlah Porsi:</span>
                        <span class="font-bold text-brand-accent"><?= esc($data['porsi']) ?> Porsi</span>

                        <span class="text-gray-500 font-semibold">Jadwal Kunjungan:</span>
                        <span class="font-bold text-brand-accent"><?= esc($data['tanggal']) ?> (Jam <?= esc($data['jam']) ?> WIB)</span>

                        <span class="text-gray-500 font-semibold">Estimasi Total:</span>
                        <span class="font-display font-black text-sm text-amber-800">Rp <?= number_format($data['total'], 0, ',', '.') ?></span>
                    </div>
                </div>

                <!-- WhatsApp Confirmation CTA -->
                <?php
                    $waMsg = "Halo Resto Triwiyatno, saya atas nama *" . $data['nama'] . "* telah mengisi form reservasi online untuk menu *" . $data['menu'] . "* sejumlah " . $data['porsi'] . " porsi pada tanggal " . $data['tanggal'] . " jam " . $data['jam'] . " WIB. Mohon konfirmasinya ya.";
                    $waLink = "https://wa.me/6281234567890?text=" . urlencode($waMsg);
                ?>
                <a href="<?= $waLink ?>" target="_blank" class="btn-bounce inline-flex items-center gap-2 px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-display font-bold text-sm rounded-xl shadow-hard transition-all">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Konfirmasi Instan via WhatsApp
                </a>
            <?php endif; ?>

            <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                <a href="<?= base_url('/reservasi') ?>" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl border border-gray-300">
                    Buat Reservasi Baru
                </a>
                <a href="<?= base_url('/') ?>" class="px-5 py-2.5 bg-brand-primary text-brand-accent font-bold text-xs rounded-xl border-2 border-brand-accent shadow-sm">
                    Kembali ke Beranda
                </a>
                <a href="<?= base_url('/reservasi/riwayat') ?>" class="px-5 py-2.5 bg-brand-accent text-brand-primary font-bold text-xs rounded-xl shadow-sm">
                    Lihat Riwayat Reservasi
                </a>
            </div>

        </div>

    </div>
</div>

<?= $this->endSection() ?>
