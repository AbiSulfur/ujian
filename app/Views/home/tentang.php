<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12 bg-amber-50/20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <span class="inline-block px-3.5 py-1 rounded-full bg-brand-primary border-2 border-brand-accent text-brand-accent font-display font-black text-xs uppercase tracking-wider shadow-sm">
                Warisan Budaya Melayu Jambi
            </span>
            <h1 class="font-display font-black text-3xl sm:text-5xl text-brand-accent tracking-tight">
                CERITA RESTO TRIWIYATNO
            </h1>
            <p class="text-base text-gray-600 max-w-2xl mx-auto font-medium">
                Membawa cita rasa sakral <strong>Nasi Gemuk</strong> dari bumi Sepucuk Jambi Sembilan Lurah ke panggung kuliner modern Indonesia.
            </p>
        </div>

        <!-- Story Content Card -->
        <div class="bg-white rounded-3xl border-2 border-brand-accent shadow-hard p-8 sm:p-12 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="space-y-4">
                    <h2 class="font-display font-black text-2xl text-brand-accent leading-snug">
                        Filosofi "Nasi Gemuk": Lambang Kemakmuran & Kehangatan
                    </h2>
                    <p class="text-sm text-gray-700 leading-relaxed font-medium">
                        Di Jambi, Nasi Gemuk bukan sekadar menu sarapan biasa. Kata <em>"Gemuk"</em> merujuk pada tekstur nasi yang kaya santan kental gurih (*rich*), melambangkan harapan akan rezeki yang melimpah dan berkah bagi setiap orang yang menyantapnya.
                    </p>
                    <p class="text-sm text-gray-700 leading-relaxed font-medium">
                        Didirikan dengan dedikasi tinggi, <strong>Resto Triwiyatno</strong> mempertahankan resep asli turun-temurun: beras pulen lokal yang dimasak bersama santan murni kelapa parut segar, daun pandan wangi, serai, dan garam halus, disajikan bersama sambal terasi ulek tangan dan taburan teri kacang renyah.
                    </p>
                </div>
                <div class="rounded-2xl border-2 border-brand-accent overflow-hidden shadow-hard bg-amber-100">
                    <img src="<?= base_url('uploads/makanan/nasi_gemuk_komplit.jpg') ?>" alt="Nasi Gemuk Jambi" class="w-full h-72 object-cover">
                </div>
            </div>

            <div class="border-t-2 border-gray-100 pt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-5 rounded-2xl bg-amber-50/60 border border-brand-accent/20 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold border border-emerald-300 shadow-sm">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h4 class="font-display font-bold text-base text-brand-accent">100% Rempah Lokal</h4>
                    <p class="text-xs text-gray-600 font-medium">
                        Menggunakan kayu manis asli Kerinci, cabai merah segar Jambi, dan terasi pilihan tanpa penyedap berlebih.
                    </p>
                </div>
                <div class="p-5 rounded-2xl bg-amber-50/60 border border-brand-accent/20 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl font-bold border border-amber-300 shadow-sm">
                        <i class="fa-solid fa-fire-burner"></i>
                    </div>
                    <h4 class="font-display font-bold text-base text-brand-accent">Masak Segar Setiap Hari</h4>
                    <p class="text-xs text-gray-600 font-medium">
                        Sajian nasi gurih dimasak hangat subuh hari dan lauk dimasak fresh demi menjaga mutu dan kenikmatan.
                    </p>
                </div>
                <div class="p-5 rounded-2xl bg-amber-50/60 border border-brand-accent/20 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl font-bold border border-blue-300 shadow-sm">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h4 class="font-display font-bold text-base text-brand-accent">Standar Modern</h4>
                    <p class="text-xs text-gray-600 font-medium">
                        Kebersihan tempat, pelayanan cepat, dan kemudahan pemesanan digital demi kenyamanan pelanggan setia.
                    </p>
                </div>
            </div>

            <!-- Lokasi & Ajakan Kunjungan -->
            <div class="p-6 rounded-2xl bg-brand-primary/30 border-2 border-brand-accent flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <h4 class="font-display font-black text-lg text-brand-accent">Siap Mencicipi Sensasi Nasi Gemuk Kami?</h4>
                    <p class="text-xs text-gray-700 font-medium">Kunjungi outlet kami di Jl. Kolonel Abunjani No. 45, Sipin, Kota Jambi.</p>
                </div>
                <a href="<?= base_url('/reservasi') ?>" class="btn-bounce px-6 py-3 bg-brand-accent text-brand-primary font-display font-bold text-xs rounded-xl shadow-hard whitespace-nowrap">
                    Reservasi Meja Sekarang
                </a>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
