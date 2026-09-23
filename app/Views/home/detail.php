<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-10 bg-amber-50/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs font-bold text-gray-500 mb-8">
            <a href="<?= base_url('/') ?>" class="hover:text-brand-accent">Beranda</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <a href="<?= base_url('/menu') ?>" class="hover:text-brand-accent">Katalog Menu</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span class="text-brand-accent bg-brand-primary/40 px-2 py-0.5 rounded"><?= esc($makanan['nama']) ?></span>
        </nav>

        <!-- Main Detail Card -->
        <div class="bg-white rounded-3xl border-2 border-brand-accent shadow-hard overflow-hidden mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 p-6 sm:p-10 items-center">
                
                <!-- Foto Makanan (Col 6) -->
                <div class="lg:col-span-6">
                    <div class="relative rounded-2xl border-2 border-brand-accent overflow-hidden shadow-hard bg-amber-100 group">
                        <img src="<?= base_url('uploads/makanan/' . esc($makanan['gambar'])) ?>" 
                             alt="<?= esc($makanan['nama']) ?>" 
                             onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800&auto=format&fit=crop&q=80'"
                             class="w-full h-80 sm:h-[420px] object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="px-3.5 py-1.5 rounded-xl bg-brand-primary text-brand-accent font-display font-black text-xs border border-brand-accent shadow-md">
                                📍 Asal Daerah: <?= esc($makanan['asal_daerah'] ?? 'Jambi') ?>
                            </span>
                            <?php if ($makanan['is_unggulan']): ?>
                                <span class="px-3 py-1 rounded-xl bg-amber-800 text-white font-bold text-xs shadow-md">
                                    ⭐ Menu Rekomendasi Chef
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="absolute bottom-4 right-4 bg-white/95 px-3 py-1 rounded-xl border border-brand-accent text-xs font-bold text-brand-accent shadow-sm">
                            Status: <span class="text-emerald-700 capitalize"><?= esc($makanan['status'] ?? 'tersedia') ?></span>
                        </div>
                    </div>
                </div>

                <!-- Informasi Detail (Col 6) -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="space-y-2">
                        <div class="inline-block px-3 py-1 bg-amber-100 text-amber-900 rounded-lg text-xs font-bold border border-amber-300">
                            <?= esc($makanan['kategori']) ?>
                        </div>
                        <h1 class="font-display font-black text-3xl sm:text-4xl text-brand-accent leading-tight">
                            <?= esc($makanan['nama']) ?>
                        </h1>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-1.5">
                            <i class="fa-solid fa-location-dot text-amber-600"></i> Kuliner Asli <?= esc($makanan['asal_daerah'] ?? 'Provinsi Jambi') ?>
                        </p>
                    </div>

                    <!-- Harga -->
                    <div class="p-4 rounded-2xl bg-amber-50 border-2 border-brand-accent/20 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold uppercase text-gray-500">Harga Satuan</span>
                            <div class="font-display font-black text-3xl text-brand-accent">
                                Rp <?= number_format($makanan['harga'], 0, ',', '.') ?>
                            </div>
                        </div>
                        <span class="text-xs font-bold px-3 py-1.5 rounded-xl bg-emerald-100 text-emerald-800 border border-emerald-300">
                            Porsi Komplit & Higienis
                        </span>
                    </div>

                    <!-- Deskripsi Rasa & Karakteristik -->
                    <div class="space-y-2">
                        <h3 class="font-display font-bold text-sm uppercase tracking-wider text-brand-accent">Deskripsi & Keunikan Rasa:</h3>
                        <p class="text-sm sm:text-base text-gray-700 leading-relaxed font-medium">
                            <?= nl2br(esc($makanan['deskripsi'])) ?>
                        </p>
                    </div>

                    <!-- Komposisi Bahan & Ciri Khas Nasi Gemuk -->
                    <div class="p-4 rounded-2xl bg-white border border-gray-200 space-y-2">
                        <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Keunggulan Sajian:</h4>
                        <div class="grid grid-cols-2 gap-2 text-xs font-semibold text-gray-700">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-600"></i> Dimasak fresh setiap hari</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-600"></i> Rempah asli tanah Jambi</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-600"></i> Sambal terasi ulek tangan</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-600"></i> Tanpa bahan pengawet</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-gray-100">
                        <!-- Direct Order via Form Reservasi -->
                        <a href="<?= base_url('/reservasi?menu=' . $makanan['id']) ?>" 
                           class="btn-bounce flex-1 inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-brand-primary hover:bg-brand-primary-hover text-brand-accent font-display font-black text-base rounded-2xl border-2 border-brand-accent shadow-hard transition-all text-center">
                            <i class="fa-solid fa-calendar-check"></i> Pesan / Reservasi Meja
                        </a>

                        <!-- Direct WhatsApp Order Simulator -->
                        <?php
                            $waText = "Halo Resto Triwiyatno, saya ingin memesan menu *" . $makanan['nama'] . "* seharga Rp " . number_format($makanan['harga'], 0, ',', '.') . " khas " . ($makanan['asal_daerah'] ?? 'Jambi') . ". Mohon info ketersediaan meja/porsi.";
                            $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waText);
                        ?>
                        <a href="<?= $waUrl ?>" target="_blank" 
                           class="btn-bounce inline-flex items-center gap-2 px-5 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-display font-bold text-sm rounded-2xl shadow-hard transition-all">
                            <i class="fa-brands fa-whatsapp text-lg"></i> Chat WhatsApp
                        </a>

                        <a href="<?= base_url('/menu/ubah/' . $makanan['id']) ?>" 
                           class="px-4 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-2xl border border-gray-300 transition-colors"
                           title="Edit Data Menu">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- REKOMENDASI MENU TERKAIT -->
        <?php if (!empty($terkait)): ?>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-display font-black text-2xl text-brand-accent">
                        REKOMENDASI MENU LAINNYA
                    </h2>
                    <a href="<?= base_url('/menu') ?>" class="text-xs font-bold text-amber-800 hover:underline">
                        Lihat Semua Menu <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($terkait as $t): ?>
                        <div class="bg-white rounded-2xl border-2 border-brand-accent shadow-hard overflow-hidden flex flex-col justify-between hover:-translate-y-1 transition-transform">
                            <div class="h-44 overflow-hidden relative">
                                <img src="<?= base_url('uploads/makanan/' . esc($t['gambar'])) ?>" alt="<?= esc($t['nama']) ?>" class="w-full h-full object-cover">
                                <span class="absolute top-2 left-2 px-2.5 py-0.5 rounded-lg bg-brand-primary text-brand-accent font-bold text-[10px] border border-brand-accent">
                                    <?= esc($t['asal_daerah']) ?>
                                </span>
                            </div>
                            <div class="p-5 space-y-3">
                                <h3 class="font-display font-bold text-base text-brand-accent">
                                    <?= esc($t['nama']) ?>
                                </h3>
                                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                    <span class="font-display font-black text-base text-brand-accent">
                                        Rp <?= number_format($t['harga'], 0, ',', '.') ?>
                                    </span>
                                    <a href="<?= base_url('/makanan/' . esc($t['slug'] ?? $t['id'])) ?>" class="px-3 py-1 bg-amber-100 hover:bg-brand-primary text-brand-accent font-bold text-xs rounded-lg border border-brand-accent">
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>
