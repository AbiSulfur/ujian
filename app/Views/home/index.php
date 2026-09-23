<?php
/**
 * @var array<int, array<string, mixed>> $menuList
 * @var array<int, array<string, mixed>> $menuUnggulan
 * @var array<int, string> $categories
 * @var string $activeKategori
 * @var string $activeSort
 * @var string $keyword
 * @var int $totalMenu
 */
$keyword        = is_string($keyword ?? null) ? $keyword : '';
$activeKategori = is_string($activeKategori ?? null) ? $activeKategori : 'Semua';
$activeSort     = is_string($activeSort ?? null) ? $activeSort : 'unggulan';
$categories     = is_array($categories ?? null) ? $categories : ['Semua', 'Menu Utama', 'Lauk Tambahan', 'Minuman'];
$menuList       = is_array($menuList ?? null) ? $menuList : [];
$menuUnggulan   = is_array($menuUnggulan ?? null) ? $menuUnggulan : [];
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- HERO SECTION (Modern Fast-Food Eatery Style ala KFC / Burger Bangor) -->
<section class="relative overflow-hidden bg-gradient-to-b from-brand-primary/20 via-amber-50/50 to-transparent py-12 md:py-20 border-b border-brand-accent/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Headline & Story -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-primary border-2 border-brand-accent text-brand-accent font-display font-black text-xs uppercase tracking-wider shadow-hard">
                    <i class="fa-solid fa-pepper-hot text-amber-900 text-sm"></i> Ikon Kuliner Provinsi Jambi
                </div>

                <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-brand-accent leading-none tracking-tight">
                    SENSASI GURIH OTENTIK <br class="hidden sm:inline">
                    <span class="inline-block relative">
                        <span class="relative z-10 text-brand-accent">NASI GEMUK</span>
                        <span class="absolute -bottom-1 left-0 w-full h-4 bg-brand-primary -rotate-1 -z-0"></span>
                    </span>
                    <span class="block text-amber-700 mt-2 text-3xl sm:text-4xl lg:text-5xl">TANAH PILIH PUSAKO BETUAH</span>
                </h1>

                <p class="text-base sm:text-lg text-brand-accent-light leading-relaxed max-w-2xl font-medium">
                    Selamat datang di <strong>Resto Triwiyatno</strong>. Kami mengangkat kekayaan rempah kuliner tradisional Jambi ke standar restoran modern. Beras pulen dimasak santan kental wangi daun pandan, dipadu sambal terasi ulek segar, dan aneka lauk istimewa.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#katalog-menu" class="btn-bounce inline-flex items-center gap-2.5 px-6 py-3.5 bg-brand-primary hover:bg-brand-primary-hover text-brand-accent font-display font-black text-base rounded-2xl border-2 border-brand-accent shadow-hard transition-all">
                        <i class="fa-solid fa-utensils"></i> Jelajahi Menu & Sorting
                    </a>
                    <a href="<?= base_url('/reservasi') ?>" class="btn-bounce inline-flex items-center gap-2.5 px-6 py-3.5 bg-brand-accent hover:bg-brand-accent-dark text-brand-primary font-display font-black text-base rounded-2xl border-2 border-brand-accent shadow-hard transition-all">
                        <i class="fa-solid fa-calendar-check"></i> Reservasi Meja Sekarang
                    </a>
                </div>

                <!-- Trust Points -->
                <div class="grid grid-cols-3 gap-4 pt-6 border-t-2 border-brand-accent/15 max-w-lg">
                    <div>
                        <div class="font-display font-black text-2xl text-brand-accent">100%</div>
                        <div class="text-xs font-semibold text-brand-accent-light">Rempah Alami Jambi</div>
                    </div>
                    <div>
                        <div class="font-display font-black text-2xl text-brand-accent">9+</div>
                        <div class="text-xs font-semibold text-brand-accent-light">Pilihan Menu Juara</div>
                    </div>
                    <div>
                        <div class="font-display font-black text-2xl text-brand-accent flex items-center gap-1">4.9 <i class="fa-solid fa-star text-amber-500 text-lg"></i></div>
                        <div class="text-xs font-semibold text-brand-accent-light">Ulasan Pelanggan</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Visual -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Accent background decor -->
                    <div class="absolute inset-0 bg-brand-primary rounded-3xl rotate-3 border-2 border-brand-accent shadow-hard-lg"></div>
                    
                    <!-- Main Image Frame -->
                    <div class="relative rounded-3xl bg-white border-2 border-brand-accent overflow-hidden -rotate-1 shadow-hard hover:rotate-0 transition-transform duration-300">
                        <img src="<?= base_url('uploads/makanan/nasi_gemuk_komplit.jpg') ?>" alt="Nasi Gemuk Komplit Spesial Jambi" class="w-full h-80 sm:h-96 object-cover">
                        
                        <!-- Floated Badges -->
                        <div class="absolute top-4 left-4 bg-brand-accent text-brand-primary px-3 py-1.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider flex items-center gap-1.5 shadow-md">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Signature Dish
                        </div>
                        <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm border-2 border-brand-accent px-4 py-2 rounded-2xl shadow-hard">
                            <div class="text-[10px] uppercase font-bold text-gray-500">Mulai Dari</div>
                            <div class="font-display font-black text-xl text-brand-accent leading-none">Rp 20.000</div>
                        </div>
                    </div>

                    <!-- Highlight Sticker -->
                    <div class="absolute -bottom-5 -left-4 bg-brand-primary text-brand-accent border-2 border-brand-accent px-4 py-2 rounded-2xl font-display font-black text-sm shadow-hard rotate-6 flex items-center gap-1.5">
                        <i class="fa-solid fa-wheat-awn text-brand-accent"></i> Beras Pilihan & Santan Murni
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- BENTO GRID KEUNGGULAN (Anti-AI Slop Design: Asymmetric & Informative) -->
<section class="py-16 bg-white border-b border-brand-accent/15">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <h2 class="font-display font-black text-3xl sm:text-4xl text-brand-accent tracking-tight">
                MENGAPA HARUS RESTO TRIWIYATNO?
            </h2>
            <p class="text-sm sm:text-base text-gray-600 font-medium">
                Komitmen kami menyajikan Nasi Gemuk terbaik dengan bahan pilihan dan cita rasa warisan leluhur Jambi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Bento 1 -->
            <div class="p-8 rounded-3xl bg-amber-50/60 border-2 border-brand-accent shadow-hard space-y-4 hover:-translate-y-1 transition-transform">
                <div class="w-14 h-14 rounded-2xl bg-brand-primary border-2 border-brand-accent flex items-center justify-center text-2xl shadow-hard text-brand-accent">
                    <i class="fa-solid fa-bowl-rice"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-brand-accent">Santan Murni & Daun Pandan Asli</h3>
                <p class="text-sm text-gray-700 leading-relaxed font-medium">
                    Nasi Gemuk kami dimasak tradisional dengan perasan santan kelapa segar pilihan dan daun pandan wangi, menghasilkan tekstur gurih pulen yang aromatik.
                </p>
            </div>

            <!-- Bento 2 (Dominant Accent) -->
            <div class="p-8 rounded-3xl bg-brand-primary border-2 border-brand-accent shadow-hard space-y-4 hover:-translate-y-1 transition-transform">
                <div class="w-14 h-14 rounded-2xl bg-brand-accent text-brand-primary flex items-center justify-center text-2xl shadow-hard">
                    <i class="fa-solid fa-pepper-hot"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-brand-accent">Sambal Terasi Ulek Otentik Jambi</h3>
                <p class="text-sm text-brand-accent/90 leading-relaxed font-semibold">
                    Kekhasan Nasi Gemuk Jambi terletak pada sambal terasi cabai merah segar yang pedas gurih manis seimbang, diracik tangan setiap pagi tanpa blender.
                </p>
            </div>

            <!-- Bento 3 -->
            <div class="p-8 rounded-3xl bg-amber-50/60 border-2 border-brand-accent shadow-hard space-y-4 hover:-translate-y-1 transition-transform">
                <div class="w-14 h-14 rounded-2xl bg-brand-primary border-2 border-brand-accent flex items-center justify-center text-2xl shadow-hard text-brand-accent">
                    <i class="fa-solid fa-crown"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-brand-accent">Kuliner Ikonik Lainnya dari Jambi</h3>
                <p class="text-sm text-gray-700 leading-relaxed font-medium">
                    Tidak hanya Nasi Gemuk, nikmati juga Gulai Tepek Ikan Gabus, Tempoyak Ikan Patin Sungai Batanghari, hingga Es Teh Kayu Manis Koja Kerinci yang legendaris.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- KATALOG MENU LENGKAP DENGAN FITUR SORTING, FILTER, & PENCARIAN -->
<section id="katalog-menu" class="py-16 bg-amber-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-amber-900 bg-brand-primary px-3 py-1 rounded-lg border border-brand-accent/20">
                    <i class="fa-solid fa-utensils text-[11px]"></i> Pilihan Kuliner Terbaik
                </div>
                <h2 class="font-display font-black text-3xl sm:text-4xl text-brand-accent tracking-tight">
                    KATALOG MENU & FITUR SORTING
                </h2>
                <p class="text-sm text-gray-600 font-medium">
                    Gunakan filter dan pengurutan (sorting) di bawah untuk menemukan sajian favorit Anda dengan cepat.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= base_url('/menu/tambah') ?>" class="btn-bounce inline-flex items-center gap-2 px-4 py-2.5 bg-brand-primary hover:bg-brand-primary-hover text-brand-accent font-display font-bold text-sm rounded-xl border-2 border-brand-accent shadow-hard transition-all">
                    <i class="fa-solid fa-plus-circle"></i> Tambah Menu Baru
                </a>
            </div>
        </div>

        <!-- FORM KONTROL: FILTER KATEGORI, LIVE SORTING, & PENCARIAN -->
        <div class="bg-white p-6 rounded-3xl border-2 border-brand-accent shadow-hard mb-10">
            <form action="<?= base_url('/') ?>#katalog-menu" method="get" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                
                <!-- 1. Search Bar -->
                <div class="md:col-span-5 relative">
                    <label class="block text-xs font-bold text-brand-accent uppercase mb-1.5">Cari Menu / Asal Daerah</label>
                    <div class="relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="q" value="<?= esc($keyword) ?>" placeholder="Contoh: Rendang, Kerinci, Sambal..." 
                               class="w-full pl-10 pr-4 py-2.5 rounded-xl border-2 border-brand-accent text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand-primary bg-amber-50/20">
                    </div>
                </div>

                <!-- 2. Filter Kategori -->
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

                <!-- 3. FITUR SORTING (PENGURUTAN) -->
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-brand-accent uppercase mb-1.5">
                        <i class="fa-solid fa-arrow-down-short-wide text-amber-600 mr-1"></i> Urutkan (Sorting)
                    </label>
                    <select name="sort" onchange="this.form.submit()" class="w-full px-3.5 py-2.5 rounded-xl border-2 border-brand-accent text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary bg-brand-primary/20 text-brand-accent cursor-pointer">
                        <option value="unggulan" <?= $activeSort === 'unggulan' ? 'selected' : '' ?>>Paling Populer / Unggulan</option>
                        <option value="termurah" <?= $activeSort === 'termurah' ? 'selected' : '' ?>>Harga Terendah (Termurah)</option>
                        <option value="termahal" <?= $activeSort === 'termahal' ? 'selected' : '' ?>>Harga Tertinggi (Termahal)</option>
                        <option value="nama_asc" <?= $activeSort === 'nama_asc' ? 'selected' : '' ?>>Nama Makanan (A - Z)</option>
                        <option value="nama_desc" <?= $activeSort === 'nama_desc' ? 'selected' : '' ?>>Nama Makanan (Z - A)</option>
                        <option value="terbaru" <?= $activeSort === 'terbaru' ? 'selected' : '' ?>>Menu Terbaru</option>
                    </select>
                </div>

                <!-- Submit / Reset Button -->
                <div class="md:col-span-1 flex items-end">
                    <button type="submit" class="w-full py-2.5 bg-brand-accent hover:bg-black text-brand-primary font-display font-bold text-sm rounded-xl border-2 border-brand-accent transition-all flex items-center justify-center" title="Terapkan Filter & Sorting">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </div>
            </form>

            <!-- Kategori Quick Badges -->
            <div class="flex flex-wrap items-center gap-2 pt-4 mt-4 border-t border-gray-100 text-xs">
                <span class="font-bold text-brand-accent mr-1">Filter Cepat:</span>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?= base_url('/?kategori=' . urlencode($cat) . '&sort=' . urlencode($activeSort)) ?>#katalog-menu"
                       class="px-3 py-1 rounded-lg border font-bold transition-all <?= $activeKategori === $cat ? 'bg-brand-primary border-brand-accent text-brand-accent shadow-sm' : 'bg-gray-100 hover:bg-gray-200 text-gray-700 border-gray-300' ?>">
                        <?= esc($cat) ?>
                    </a>
                <?php endforeach; ?>
                <?php if (!empty($keyword) || $activeKategori !== 'Semua' || $activeSort !== 'unggulan'): ?>
                    <a href="<?= base_url('/') ?>#katalog-menu" class="ml-auto text-xs font-bold text-rose-600 hover:underline">
                        <i class="fa-solid fa-rotate-left"></i> Reset Filter
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Indikator Hasil -->
        <div class="flex justify-between items-center mb-6 text-sm text-gray-600 font-medium">
            <div>
                Menampilkan <strong class="text-brand-accent"><?= count($menuList) ?></strong> menu kuliner khas Jambi
                <?php if ($activeKategori !== 'Semua'): ?>
                    kategori <span class="font-bold text-brand-accent">"<?= esc($activeKategori) ?>"</span>
                <?php endif; ?>
            </div>
            <div class="text-xs font-bold text-amber-900 bg-amber-100 px-3 py-1 rounded-md">
                Sorting Aktif: 
                <?php
                    $sortLabels = [
                        'unggulan' => 'Paling Populer',
                        'termurah' => 'Harga Termurah',
                        'termahal' => 'Harga Termahal',
                        'nama_asc' => 'Nama (A-Z)',
                        'nama_desc' => 'Nama (Z-A)',
                        'terbaru'  => 'Terbaru',
                    ];
                    echo esc($sortLabels[$activeSort] ?? 'Standar');
                ?>
            </div>
        </div>

        <!-- GRID MENU MAKANAN (MINIMAL 8 VARIASI KULINER JAMBI) -->
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
                                        <i class="fa-solid fa-star text-brand-primary text-[9px]"></i> Unggulan
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

                                <div class="flex items-center gap-2">
                                    <a href="<?= base_url('/makanan/' . esc($m['slug'] ?? $m['id'])) ?>" 
                                       class="px-3.5 py-2 bg-amber-100 hover:bg-brand-primary text-brand-accent font-display font-bold text-xs rounded-xl border border-brand-accent transition-colors"
                                       title="Lihat Detail Makanan">
                                        Detail
                                    </a>
                                    <a href="<?= base_url('/reservasi?menu=' . $m['id']) ?>" 
                                       class="btn-bounce px-4 py-2 bg-brand-accent hover:bg-black text-brand-primary font-display font-black text-xs rounded-xl shadow-hard transition-all flex items-center gap-1.5"
                                       title="Pesan Menu Ini">
                                        <i class="fa-solid fa-cart-shopping text-[11px]"></i> Pesan
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Empty state -->
            <div class="text-center py-16 bg-white rounded-3xl border-2 border-brand-accent p-8 space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center text-3xl mx-auto border border-brand-accent/20">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-brand-accent">Menu Tidak Ditemukan</h3>
                <p class="text-sm text-gray-600 max-w-md mx-auto">
                    Tidak ada menu kuliner yang cocok dengan kata kunci atau filter yang Anda pilih. Coba reset filter untuk melihat semua sajian.
                </p>
                <a href="<?= base_url('/') ?>#katalog-menu" class="inline-block px-5 py-2.5 bg-brand-primary text-brand-accent font-bold text-sm rounded-xl border-2 border-brand-accent">
                    Reset Filter
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- CALL TO ACTION RESERVASI MEJA & PRE-ORDER -->
<section class="py-16 bg-brand-primary border-t-2 border-brand-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-4 py-1 rounded-full bg-brand-accent text-brand-primary font-display font-black text-xs uppercase tracking-wider">
            Reservasi Cepat & Nyaman
        </span>
        <h2 class="font-display font-black text-3xl sm:text-5xl text-brand-accent tracking-tight max-w-3xl mx-auto">
            INGIN MENIKMATI NASI GEMUK BERSAMA KELUARGA ATAU ROMBONGAN?
        </h2>
        <p class="text-base sm:text-lg text-brand-accent-dark font-medium max-w-2xl mx-auto">
            Amankan meja Anda lebih awal atau pre-order paket katering Nasi Gemuk Komplit khas Jambi melalui form pemesanan online kami.
        </p>
        <div class="pt-2">
            <a href="<?= base_url('/reservasi') ?>" class="btn-bounce inline-flex items-center gap-3 px-8 py-4 bg-brand-accent hover:bg-black text-brand-primary font-display font-black text-lg rounded-2xl shadow-hard transition-all">
                <i class="fa-solid fa-clipboard-list text-xl"></i> Buka Form Reservasi & Pre-Order
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
