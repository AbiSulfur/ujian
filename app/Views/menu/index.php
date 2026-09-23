<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 bg-amber-50/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Info -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <span class="inline-block px-3.5 py-1 rounded-full bg-brand-primary border-2 border-brand-accent text-brand-accent font-display font-black text-xs uppercase tracking-wider shadow-sm">
                    Katalog Kuliner Jambi
                </span>
                <h1 class="font-display font-black text-3xl sm:text-5xl text-brand-accent tracking-tight mt-2">
                    DAFTAR MENU & FITUR SORTING
                </h1>
                <p class="text-sm sm:text-base text-gray-600 font-medium max-w-xl">
                    Pilihan kuliner otentik khas Provinsi Jambi. Silakan gunakan fitur <strong>Sorting</strong> dan <strong>Filter</strong> untuk mengurutkan menu sesuai selera.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= base_url('/menu/tambah') ?>" class="btn-bounce inline-flex items-center gap-2 px-5 py-3 bg-brand-primary hover:bg-brand-primary-hover text-brand-accent font-display font-black text-sm rounded-2xl border-2 border-brand-accent shadow-hard transition-all">
                    <i class="fa-solid fa-plus-circle text-base"></i> Tambah Menu Baru
                </a>
            </div>
        </div>

        <!-- FORM KONTROL SORTING & FILTER -->
        <div class="bg-white p-6 rounded-3xl border-2 border-brand-accent shadow-hard mb-10">
            <form action="<?= base_url('/menu') ?>" method="get" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                
                <!-- Search Keyword -->
                <div class="md:col-span-5">
                    <label class="block text-xs font-bold text-brand-accent uppercase mb-1.5">Pencarian Menu</label>
                    <div class="relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="q" value="<?= esc($keyword) ?>" placeholder="Cari nama makanan atau asal daerah..." 
                               class="w-full pl-10 pr-4 py-2.5 rounded-xl border-2 border-brand-accent text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand-primary bg-amber-50/20">
                    </div>
                </div>

                <!-- Kategori Dropdown -->
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-brand-accent uppercase mb-1.5">Kategori Menu</label>
                    <select name="kategori" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 rounded-xl border-2 border-brand-accent text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary bg-white cursor-pointer">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= esc($cat) ?>" <?= $activeKategori === $cat ? 'selected' : '' ?>>
                                <?= esc($cat) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- FITUR SORTING (PENGURUTAN MULTI-KRITERIA) -->
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-brand-accent uppercase mb-1.5">
                        <i class="fa-solid fa-arrow-down-short-wide text-amber-600 mr-1"></i> Urutkan (Sorting)
                    </label>
                    <select name="sort" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 rounded-xl border-2 border-brand-accent text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary bg-brand-primary/20 text-brand-accent cursor-pointer">
                        <option value="unggulan" <?= $activeSort === 'unggulan' ? 'selected' : '' ?>>⭐ Paling Populer / Unggulan</option>
                        <option value="termurah" <?= $activeSort === 'termurah' ? 'selected' : '' ?>>💰 Harga Terendah (Termurah)</option>
                        <option value="termahal" <?= $activeSort === 'termahal' ? 'selected' : '' ?>>💎 Harga Tertinggi (Termahal)</option>
                        <option value="nama_asc" <?= $activeSort === 'nama_asc' ? 'selected' : '' ?>>🔤 Nama Makanan (A - Z)</option>
                        <option value="nama_desc" <?= $activeSort === 'nama_desc' ? 'selected' : '' ?>>🔤 Nama Makanan (Z - A)</option>
                        <option value="terbaru" <?= $activeSort === 'terbaru' ? 'selected' : '' ?>>🆕 Menu Terbaru</option>
                    </select>
                </div>

                <!-- Action Button -->
                <div class="md:col-span-1 flex items-end">
                    <button type="submit" class="w-full py-2.5 bg-brand-accent hover:bg-black text-brand-primary font-display font-bold text-sm rounded-xl border-2 border-brand-accent transition-all flex items-center justify-center" title="Terapkan">
                        <i class="fa-solid fa-filter"></i>
                    </button>
                </div>

            </form>

            <div class="flex flex-wrap items-center gap-2 pt-4 mt-4 border-t border-gray-100 text-xs">
                <span class="font-bold text-brand-accent mr-1">Kategori:</span>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?= base_url('/menu?kategori=' . urlencode($cat) . '&sort=' . urlencode($activeSort)) ?>"
                       class="px-3 py-1 rounded-lg border font-bold transition-all <?= $activeKategori === $cat ? 'bg-brand-primary border-brand-accent text-brand-accent shadow-sm' : 'bg-gray-100 hover:bg-gray-200 text-gray-700 border-gray-300' ?>">
                        <?= esc($cat) ?>
                    </a>
                <?php endforeach; ?>
                <?php if (!empty($keyword) || $activeKategori !== 'Semua' || $activeSort !== 'terbaru'): ?>
                    <a href="<?= base_url('/menu') ?>" class="ml-auto text-xs font-bold text-rose-600 hover:underline">
                        <i class="fa-solid fa-rotate-left"></i> Reset Filter & Sorting
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Result Status -->
        <div class="flex justify-between items-center mb-6 text-sm text-gray-600 font-medium">
            <div>
                Menemukan <strong class="text-brand-accent"><?= count($menuList) ?></strong> menu kuliner khas Jambi
            </div>
            <div class="text-xs font-bold text-amber-900 bg-amber-100 px-3 py-1 rounded-md">
                Kriteria Sorting: 
                <?php
                    $sortLabels = [
                        'unggulan' => 'Paling Populer',
                        'termurah' => 'Harga Termurah (ASC)',
                        'termahal' => 'Harga Termahal (DESC)',
                        'nama_asc' => 'Nama (A - Z)',
                        'nama_desc' => 'Nama (Z - A)',
                        'terbaru'  => 'Terbaru',
                    ];
                    echo esc($sortLabels[$activeSort] ?? 'Terbaru');
                ?>
            </div>
        </div>

        <!-- MENU CARDS -->
        <?php if (!empty($menuList)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($menuList as $m): ?>
                    <div class="group bg-white rounded-3xl border-2 border-brand-accent shadow-hard hover:shadow-hard-lg hover:-translate-y-1.5 transition-all duration-300 flex flex-col overflow-hidden">
                        
                        <!-- Thumbnail Image -->
                        <div class="relative h-56 bg-amber-100 overflow-hidden border-b-2 border-brand-accent">
                            <img src="<?= base_url('uploads/makanan/' . esc($m['gambar'])) ?>" 
                                 alt="<?= esc($m['nama']) ?>" 
                                 onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&auto=format&fit=crop&q=80'"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-xl bg-brand-primary text-brand-accent font-display font-black text-xs border border-brand-accent shadow-sm">
                                    <i class="fa-solid fa-map-pin text-[10px]"></i> <?= esc($m['asal_daerah'] ?? 'Jambi') ?>
                                </span>
                                <?php if ($m['is_unggulan']): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-lg bg-amber-800 text-white font-bold text-[10px] shadow-sm">
                                        ⭐ Unggulan
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="absolute bottom-3 right-3">
                                <span class="px-2.5 py-1 rounded-lg bg-white/95 border border-brand-accent text-xs font-bold text-brand-accent shadow-sm">
                                    <?= esc($m['kategori']) ?>
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="font-display font-black text-xl text-brand-accent leading-snug group-hover:text-amber-700 transition-colors">
                                    <?= esc($m['nama']) ?>
                                </h3>
                                
                                <p class="text-xs text-gray-600 font-medium line-clamp-2 mt-2 leading-relaxed">
                                    <?= esc($m['deskripsi']) ?>
                                </p>
                            </div>

                            <!-- Price & Actions -->
                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2">
                                <div>
                                    <div class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Harga</div>
                                    <div class="font-display font-black text-xl text-brand-accent leading-none">
                                        Rp <?= number_format($m['harga'], 0, ',', '.') ?>
                                    </div>
                                </div>

                                <div class="flex items-center gap-1.5">
                                    <a href="<?= base_url('/makanan/' . esc($m['slug'] ?? $m['id'])) ?>" 
                                       class="px-3 py-2 bg-amber-100 hover:bg-brand-primary text-brand-accent font-display font-bold text-xs rounded-xl border border-brand-accent transition-colors">
                                        Detail
                                    </a>
                                    <a href="<?= base_url('/menu/ubah/' . $m['id']) ?>" 
                                       class="p-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl border border-gray-300 text-xs"
                                       title="Ubah Menu">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="<?= base_url('/menu/hapus/' . $m['id']) ?>" method="post" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="p-2 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-xl border border-rose-300 text-xs" title="Hapus Menu">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-16 bg-white rounded-3xl border-2 border-brand-accent p-8 space-y-4">
                <div class="text-5xl">🍲</div>
                <h3 class="font-display font-bold text-xl text-brand-accent">Tidak Ada Data Menu</h3>
                <p class="text-sm text-gray-600 max-w-md mx-auto">
                    Katalog saat ini kosong atau hasil filter tidak ditemukan.
                </p>
                <a href="<?= base_url('/menu/tambah') ?>" class="inline-block px-5 py-2.5 bg-brand-primary text-brand-accent font-bold text-sm rounded-xl border-2 border-brand-accent shadow-sm">
                    Tambah Menu Kuliner Baru
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>
