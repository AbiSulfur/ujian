<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 bg-amber-50/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-amber-900 bg-brand-primary px-3 py-1 rounded-lg border border-brand-accent/20">
                    Database Rekap Pemesanan
                </span>
                <h1 class="font-display font-black text-3xl sm:text-4xl text-brand-accent tracking-tight mt-1">
                    RIWAYAT RESERVASI & PEMESANAN MASUK
                </h1>
                <p class="text-sm text-gray-600 font-medium">
                    Daftar seluruh data formulir pemesanan meja dan pre-order katering yang tersimpan di sistem.
                </p>
            </div>

            <a href="<?= base_url('/reservasi') ?>" class="btn-bounce inline-flex items-center gap-2 px-5 py-2.5 bg-brand-primary hover:bg-brand-primary-hover text-brand-accent font-display font-black text-xs rounded-xl border-2 border-brand-accent shadow-hard">
                <i class="fa-solid fa-plus-circle"></i> Tambah Reservasi Baru
            </a>
        </div>

        <div class="bg-white rounded-3xl border-2 border-brand-accent shadow-hard overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-brand-primary text-brand-accent font-display font-black text-xs uppercase border-b-2 border-brand-accent">
                        <tr>
                            <th class="py-4 px-4 text-center">No</th>
                            <th class="py-4 px-4">Nama Pemesan</th>
                            <th class="py-4 px-4">Kontak (WhatsApp / Email)</th>
                            <th class="py-4 px-4">Menu Dipesan</th>
                            <th class="py-4 px-4 text-center">Porsi</th>
                            <th class="py-4 px-4">Waktu Kunjungan</th>
                            <th class="py-4 px-4">Catatan</th>
                            <th class="py-4 px-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if (!empty($reservasi)): ?>
                            <?php foreach ($reservasi as $i => $r): ?>
                                <tr class="hover:bg-amber-50/50 transition-colors">
                                    <td class="py-4 px-4 font-bold text-center text-gray-500"><?= $i + 1 ?></td>
                                    <td class="py-4 px-4 font-bold text-brand-accent"><?= esc($r['nama_pemesan']) ?></td>
                                    <td class="py-4 px-4 text-xs font-semibold text-gray-700">
                                        <div class="flex items-center gap-1.5"><i class="fa-brands fa-whatsapp text-emerald-600"></i> <?= esc($r['no_whatsapp']) ?></div>
                                        <div class="text-gray-400 text-[11px]"><?= esc($r['email']) ?></div>
                                    </td>
                                    <td class="py-4 px-4 font-semibold text-brand-accent">
                                        <?= esc($r['nama_makanan'] ?? 'Menu Khas Jambi') ?>
                                    </td>
                                    <td class="py-4 px-4 text-center font-display font-black text-brand-accent">
                                        <?= esc($r['jumlah_porsi']) ?> porsi
                                    </td>
                                    <td class="py-4 px-4 text-xs font-bold text-gray-700">
                                        <div><?= date('d M Y', strtotime($r['tanggal_kunjungan'])) ?></div>
                                        <div class="text-amber-800 text-[11px] font-semibold">Pukul <?= esc($r['jam_kunjungan']) ?> WIB</div>
                                    </td>
                                    <td class="py-4 px-4 text-xs text-gray-500 italic max-w-xs truncate">
                                        <?= esc($r['catatan'] ?: '-') ?>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs border border-emerald-300">
                                            <?= esc($r['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-12 text-gray-500">
                                    <div class="text-3xl mb-2">📋</div>
                                    Belum ada data reservasi yang masuk. <br>
                                    <a href="<?= base_url('/reservasi') ?>" class="text-xs font-bold text-amber-800 hover:underline">
                                        Coba isi form reservasi sekarang
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
