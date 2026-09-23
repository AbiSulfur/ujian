<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 bg-amber-50/30">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Info -->
        <div class="text-center space-y-3 mb-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-brand-primary border-2 border-brand-accent text-brand-accent font-display font-black text-xs uppercase tracking-wider shadow-sm">
                <i class="fa-solid fa-calendar-check"></i> Form Pemesanan Online
            </div>
            <h1 class="font-display font-black text-3xl sm:text-5xl text-brand-accent tracking-tight">
                RESERVASI MEJA & PRE-ORDER MENU
            </h1>
            <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto font-medium">
                Silakan isi data di bawah ini dengan lengkap dan valid. Sistem kami dilengkapi dengan <strong>Validasi Form Server-Side</strong> untuk memastikan pesanan Anda tercatat akurat.
            </p>
        </div>

        <!-- FORM RESERVASI DENGAN VALIDASI SERVER-SIDE CI4 -->
        <div class="bg-white rounded-3xl border-2 border-brand-accent shadow-hard p-6 sm:p-10">
            
            <form action="<?= base_url('/reservasi/simpan') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>

                <div class="border-b-2 border-brand-accent/10 pb-4 mb-6">
                    <h3 class="font-display font-black text-lg text-brand-accent flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-brand-primary text-brand-accent flex items-center justify-center text-sm font-black border border-brand-accent">1</span>
                        Informasi Pemesan
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- 1. Nama Pemesan -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Nama Lengkap Pemesan <span class="text-rose-600">*</span>
                        </label>
                        <input type="text" name="nama_pemesan" 
                               value="<?= esc(old('nama_pemesan')) ?>" 
                               placeholder="Contoh: Rian Triwiyatno"
                               class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.nama_pemesan') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <?php if (session('errors.nama_pemesan')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.nama_pemesan')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 2. Nomor WhatsApp -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Nomor WhatsApp Aktif <span class="text-rose-600">*</span>
                        </label>
                        <input type="text" name="no_whatsapp" 
                               value="<?= esc(old('no_whatsapp')) ?>" 
                               placeholder="Contoh: 081234567890 (Hanya Angka)"
                               class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.no_whatsapp') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <?php if (session('errors.no_whatsapp')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.no_whatsapp')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 3. Alamat Email -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Alamat Email Valid <span class="text-rose-600">*</span>
                        </label>
                        <input type="email" name="email" 
                               value="<?= esc(old('email')) ?>" 
                               placeholder="nama@email.com"
                               class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.email') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <?php if (session('errors.email')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.email')) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="border-b-2 border-brand-accent/10 pb-4 pt-4 mb-6">
                    <h3 class="font-display font-black text-lg text-brand-accent flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-brand-primary text-brand-accent flex items-center justify-center text-sm font-black border border-brand-accent">2</span>
                        Pilihan Menu Nasi Gemuk & Waktu Kunjungan
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- 4. Pilihan Menu Makanan -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Pilih Menu Khas Jambi <span class="text-rose-600">*</span>
                        </label>
                        <select name="makanan_id" id="menuSelect" class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.makanan_id') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary cursor-pointer">
                            <option value="">-- Pilih Sajian Kuliner --</option>
                            <?php foreach ($makananList as $m): ?>
                                <option value="<?= $m['id'] ?>" 
                                        data-harga="<?= $m['harga'] ?>"
                                        <?= (old('makanan_id', $selectedMenu) == $m['id']) ? 'selected' : '' ?>>
                                    <?= esc($m['nama']) ?> — Rp <?= number_format($m['harga'], 0, ',', '.') ?> (<?= esc($m['asal_daerah']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session('errors.makanan_id')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.makanan_id')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 5. Jumlah Porsi -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Jumlah Porsi (Porsi Minimal 1) <span class="text-rose-600">*</span>
                        </label>
                        <input type="number" name="jumlah_porsi" id="porsiInput" min="1" max="100" 
                               value="<?= esc(old('jumlah_porsi', 1)) ?>" 
                               class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.jumlah_porsi') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <?php if (session('errors.jumlah_porsi')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.jumlah_porsi')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 6. Tanggal Kunjungan -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Tanggal Kunjungan / Pemesanan <span class="text-rose-600">*</span>
                        </label>
                        <input type="date" name="tanggal_kunjungan" 
                               value="<?= esc(old('tanggal_kunjungan', date('Y-m-d'))) ?>" 
                               class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.tanggal_kunjungan') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                        <?php if (session('errors.tanggal_kunjungan')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.tanggal_kunjungan')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 7. Jam Kunjungan -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Perkiraan Jam Kedatangan <span class="text-rose-600">*</span>
                        </label>
                        <select name="jam_kunjungan" class="w-full px-4 py-3 rounded-xl border-2 <?= session('errors.jam_kunjungan') ? 'border-rose-500 bg-rose-50/30' : 'border-brand-accent bg-amber-50/20' ?> text-sm font-bold focus:outline-none focus:ring-2 focus:ring-brand-primary">
                            <?php 
                                $times = ['07:00', '08:00', '09:00', '10:00', '11:30', '12:30', '13:30', '17:00', '18:30', '19:30', '20:30'];
                                foreach ($times as $t): 
                            ?>
                                <option value="<?= $t ?>" <?= old('jam_kunjungan') == $t ? 'selected' : '' ?>><?= $t ?> WIB</option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session('errors.jam_kunjungan')): ?>
                            <p class="text-xs font-bold text-rose-600 mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> <?= esc(session('errors.jam_kunjungan')) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- 8. Catatan Khusus -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-accent mb-2">
                            Catatan Khusus (Opsional: Tingkat Pedas Sambal, Permintaan Meja, dll)
                        </label>
                        <textarea name="catatan" rows="3" placeholder="Contoh: Sambal terasi dipisah, tolong siapkan baby chair..." 
                                  class="w-full px-4 py-3 rounded-xl border-2 border-brand-accent bg-amber-50/20 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand-primary"><?= esc(old('catatan')) ?></textarea>
                    </div>
                </div>

                <!-- Estimasi Total Biaya Live Preview Box -->
                <div class="p-5 rounded-2xl bg-brand-primary/30 border-2 border-brand-accent flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase text-gray-600">Estimasi Total Biaya Pesanan:</span>
                        <div id="liveTotal" class="font-display font-black text-2xl text-brand-accent">
                            Rp 0
                        </div>
                    </div>
                    <div class="text-xs text-brand-accent/80 font-semibold text-right">
                        *Pembayaran dapat dilakukan langsung di kasir Resto Triwiyatno.
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="btn-bounce w-full py-4 bg-brand-accent hover:bg-black text-brand-primary font-display font-black text-lg rounded-2xl border-2 border-brand-accent shadow-hard transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Form Reservasi & Pesanan
                    </button>
                    <p class="text-center text-xs text-gray-500 font-medium mt-2">
                        Data form akan divalidasi langsung oleh sistem CodeIgniter 4 sebelum disimpan.
                    </p>
                </div>

            </form>

        </div>

    </div>
</div>

<!-- Script Hitung Estimasi Total -->
<script>
    function hitungTotal() {
        var select = document.getElementById('menuSelect');
        var porsiInput = document.getElementById('porsiInput');
        var liveTotal = document.getElementById('liveTotal');
        
        var selectedOption = select.options[select.selectedIndex];
        var harga = selectedOption ? parseInt(selectedOption.getAttribute('data-harga') || 0) : 0;
        var porsi = parseInt(porsiInput.value) || 0;

        var total = harga * porsi;
        liveTotal.innerText = 'Rp ' + total.toLocaleString('id-ID');
    }

    document.getElementById('menuSelect').addEventListener('change', hitungTotal);
    document.getElementById('porsiInput').addEventListener('input', hitungTotal);
    // Initial run
    hitungTotal();
</script>

<?= $this->endSection() ?>
