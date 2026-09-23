<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 bg-amber-50/20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb & Header -->
        <div class="mb-8">
            <nav class="flex items-center gap-2 text-xs font-bold text-gray-500 mb-3">
                <a href="<?= base_url('/') ?>" class="hover:text-brand-accent">Beranda</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <a href="<?= base_url('/menu') ?>" class="hover:text-brand-accent">Katalog Menu</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-brand-accent"><?= $makanan ? 'Ubah Menu' : 'Tambah Menu Baru' ?></span>
            </nav>
            <h1 class="font-display font-black text-3xl sm:text-4xl text-brand-accent tracking-tight">
                <?= $makanan ? 'Ubah Data Menu Kuliner' : 'Tambah Menu Kuliner Khas Jambi' ?>
            </h1>
            <p class="text-sm text-gray-600 font-medium mt-1">
                Lengkapi formulir di bawah ini. Dilengkapi dengan <strong>Validasi Form Server-Side CodeIgniter 4</strong>.
            </p>
        </div>

        <!-- FORM TAMBAH / UBAH MENU -->
        <div class="bg-white rounded-3xl border-2 border-brand-accent shadow-hard p-6 sm:p-10">
            <form action="<?= base_url($makanan ? '/menu/update/' . $makanan['id'] : '/menu/simpan') ?>" 
                  method="post" 
                  enctype="multipart/form-data" 
                  class="space-y-6">
                
                <?= csrf_field() ?>

                <!-- 1. Nama Makanan -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                        Nama Makanan <span class="text-rose-600">*</span>
                    </label>
                    <input type="text" name="nama_makanan" 
                           value="<?= esc(old('nama_makanan', $makanan['nama'] ?? '')) ?>" 
                           placeholder="Contoh: Nasi Gemuk Sambal Terasi Spesial"
                           class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.nama_makanan') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                    <?php if (session('errors.nama_makanan')): ?>
                        <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.nama_makanan')) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- 2. Asal Daerah -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Asal Daerah Kuliner <span class="text-rose-600">*</span>
                        </label>
                        <input type="text" name="asal_daerah" 
                               value="<?= esc(old('asal_daerah', $makanan['asal_daerah'] ?? 'Kota Jambi')) ?>" 
                               placeholder="Contoh: Kota Jambi, Danau Sipin, Kerinci..."
                               class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.asal_daerah') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <?php if (session('errors.asal_daerah')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.asal_daerah')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 3. Kategori Menu -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Kategori Menu <span class="text-rose-600">*</span>
                        </label>
                        <select name="kategori" class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.kategori') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary cursor-pointer">
                            <?php 
                                $cats = ['Menu Utama', 'Lauk Tambahan', 'Minuman'];
                                $curCat = old('kategori', $makanan['kategori'] ?? 'Menu Utama');
                                foreach ($cats as $c): 
                            ?>
                                <option value="<?= $c ?>" <?= $curCat === $c ? 'selected' : '' ?>><?= $c ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session('errors.kategori')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.kategori')) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- 4. Harga -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Harga Satuan (Rupiah) <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-gray-500">Rp</span>
                            <input type="number" name="harga" min="1000" step="500"
                                   value="<?= esc(old('harga', $makanan ? (int)$makanan['harga'] : '')) ?>" 
                                   placeholder="25000"
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border-2 <?= session('errors.harga') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-black focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        </div>
                        <?php if (session('errors.harga')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.harga')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 5. Status Ketersediaan -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Status Ketersediaan
                        </label>
                        <select name="status" class="w-full px-4 py-3 rounded-xl border-2 border-brand-accent bg-amber-50/20 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary cursor-pointer">
                            <option value="tersedia" <?= old('status', $makanan['status'] ?? '') === 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                            <option value="habis" <?= old('status', $makanan['status'] ?? '') === 'habis' ? 'selected' : '' ?>>Habis</option>
                        </select>
                    </div>
                </div>

                <!-- 6. Deskripsi Singkat -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                        Deskripsi Singkat (Citarasa, Bumbu Rempah & Penyajian) <span class="text-rose-600">*</span>
                    </label>
                    <textarea name="deskripsi_singkat" rows="4" 
                              placeholder="Jelaskan keunikan rasa, kelezatan santan, sambal, atau lauk pendamping khas Jambi..." 
                              class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.deskripsi_singkat') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand-primary"><?= esc(old('deskripsi_singkat', $makanan['deskripsi'] ?? '')) ?></textarea>
                    <?php if (session('errors.deskripsi_singkat')): ?>
                        <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.deskripsi_singkat')) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- 7. Upload File Foto Gambar Makanan -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                        Foto / Gambar Makanan (JPG, JPEG, PNG, WebP — Maks 4MB)
                    </label>
                    
                    <?php if ($makanan && !empty($makanan['gambar'])): ?>
                        <div class="flex items-center gap-4 mb-3 p-3 bg-amber-50 rounded-2xl border border-brand-accent/20">
                            <img src="<?= base_url('uploads/makanan/' . esc($makanan['gambar'])) ?>" alt="Preview" class="w-16 h-16 rounded-xl object-cover border border-brand-accent">
                            <div class="text-xs text-gray-600">
                                <strong>Gambar Saat Ini:</strong> <?= esc($makanan['gambar']) ?><br>
                                <span class="text-gray-400">Pilih file baru jika ingin mengganti gambar di atas.</span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <input type="file" name="gambar" accept="image/*"
                           class="w-full px-4 py-2.5 rounded-xl border-2 <?= session('errors.gambar') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-white' ?> text-sm font-medium file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-primary file:text-brand-accent hover:file:bg-brand-primary-hover cursor-pointer">
                    <?php if (session('errors.gambar')): ?>
                        <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.gambar')) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- 8. Menu Unggulan Checkbox -->
                <div class="p-4 rounded-2xl bg-amber-50/60 border border-brand-accent/30 flex items-center gap-3">
                    <input type="checkbox" name="is_unggulan" value="1" id="is_unggulan" 
                           <?= old('is_unggulan', $makanan['is_unggulan'] ?? 0) ? 'checked' : '' ?>
                           class="w-5 h-5 rounded text-amber-600 focus:ring-brand-primary border-brand-accent cursor-pointer">
                    <label for="is_unggulan" class="text-xs font-bold text-brand-accent cursor-pointer flex items-center gap-1.5">
                        <i class="fa-solid fa-star text-amber-500"></i> Jadikan Menu Unggulan (Akan disorot di Beranda & prioritas sorting "Paling Populer")
                    </label>
                </div>

                <!-- Buttons -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100">
                    <a href="<?= base_url('/menu') ?>" class="px-5 py-3 rounded-xl border-2 border-brand-accent font-display font-bold text-xs text-brand-accent hover:bg-gray-100 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="btn-bounce px-7 py-3 bg-brand-primary hover:bg-brand-primary-hover text-brand-accent font-display font-black text-sm rounded-xl border-2 border-brand-accent shadow-hard transition-all flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Data Menu
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
