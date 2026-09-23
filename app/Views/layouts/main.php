<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Resto Triwiyatno - Nasi Gemuk Khas Jambi') ?></title>
    
    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#FDE047',   // Kuning Emas Dominan (Navbar, Tombol Utama)
                            'primary-hover': '#FACC15',
                            accent: '#1F2937',    // Slate Charcoal Pendukung (Badge, Border, Teks Kontras)
                            'accent-dark': '#111827',
                            'accent-light': '#374151',
                            surface: '#FFFBEB',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Outfit"', 'sans-serif'],
                    },
                    boxShadow: {
                        'brand': '0 10px 25px -5px rgba(31, 41, 55, 0.1), 0 8px 10px -6px rgba(31, 41, 55, 0.1)',
                        'hard': '4px 4px 0px 0px #1F2937',
                        'hard-lg': '6px 6px 0px 0px #1F2937',
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Custom accessibility & micro-animations */
        .btn-bounce {
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .btn-bounce:hover {
            transform: translateY(-2px);
        }
        .btn-bounce:active {
            transform: translateY(1px);
        }
        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body class="bg-amber-50/40 text-brand-accent min-h-screen flex flex-col font-sans antialiased selection:bg-brand-primary selection:text-brand-accent">

    <!-- Top Announcement Bar -->
    <div class="bg-brand-accent text-brand-primary text-xs font-semibold py-2 px-4 border-b border-brand-accent">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-brand-primary animate-ping"></span>
                <span><i class="fa-solid fa-fire text-brand-primary mr-1"></i> <strong>Spesial Tanah Pilih Pusako Betuah:</strong> Nikmati Kelezatan Nasi Gemuk Otentik Khas Jambi Hari Ini!</span>
            </div>
            <div class="flex items-center gap-4 text-xs font-medium text-amber-200">
                <span><i class="fa-solid fa-location-dot mr-1"></i> Jl. Kolonel Abunjani, Kota Jambi</span>
                <span class="hidden sm:inline"><i class="fa-solid fa-clock mr-1"></i> Buka 06.30 - 21.00 WIB</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar (Warna Utama #FDE047) -->
    <header class="sticky top-0 z-50 bg-brand-primary border-b-2 border-brand-accent shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo & Brand Identity -->
                <a href="<?= base_url('/') ?>" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 rounded-2xl bg-brand-accent text-brand-primary flex items-center justify-center font-display font-black text-2xl shadow-hard group-hover:rotate-6 transition-transform">
                        T
                    </div>
                    <div>
                        <div class="font-display font-black text-2xl tracking-tight text-brand-accent leading-none">
                            RESTO <span class="text-amber-800">TRIWIYATNO</span>
                        </div>
                        <div class="text-[11px] font-bold uppercase tracking-wider text-brand-accent/80 flex items-center gap-1.5 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-accent"></span>
                            Nasi Gemuk Khas Jambi
                        </div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2">
                    <a href="<?= base_url('/') ?>" class="px-4 py-2 font-display font-bold text-sm text-brand-accent rounded-xl hover:bg-black/10 transition-colors <?= current_url() == base_url('/') ? 'bg-black/10' : '' ?>">
                        <i class="fa-solid fa-house mr-1 text-xs"></i> Beranda
                    </a>
                    <a href="<?= base_url('/menu') ?>" class="px-4 py-2 font-display font-bold text-sm text-brand-accent rounded-xl hover:bg-black/10 transition-colors <?= str_contains(current_url(), 'menu') ? 'bg-black/10' : '' ?>">
                        <i class="fa-solid fa-utensils mr-1 text-xs"></i> Menu & Sorting
                    </a>
                    <a href="<?= base_url('/reservasi') ?>" class="px-4 py-2 font-display font-bold text-sm text-brand-accent rounded-xl hover:bg-black/10 transition-colors <?= str_contains(current_url(), 'reservasi') ? 'bg-black/10' : '' ?>">
                        <i class="fa-solid fa-calendar-check mr-1 text-xs"></i> Reservasi & Order
                    </a>
                    <a href="<?= base_url('/tentang') ?>" class="px-4 py-2 font-display font-bold text-sm text-brand-accent rounded-xl hover:bg-black/10 transition-colors <?= str_contains(current_url(), 'tentang') ? 'bg-black/10' : '' ?>">
                        <i class="fa-solid fa-circle-info mr-1 text-xs"></i> Cerita Resto
                    </a>
                </nav>

                <!-- Action Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="<?= base_url('/menu/tambah') ?>" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-amber-200/80 hover:bg-amber-200 text-brand-accent font-display font-bold text-xs rounded-xl border border-brand-accent/30 transition-all">
                        <i class="fa-solid fa-plus text-xs"></i> Tambah Menu
                    </a>
                    <a href="<?= base_url('/reservasi') ?>" class="btn-bounce inline-flex items-center gap-2 px-5 py-2.5 bg-brand-accent hover:bg-black text-brand-primary font-display font-black text-sm rounded-xl shadow-hard transition-all">
                        <i class="fa-solid fa-bell-concierge"></i> Pesan Meja
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" type="button" class="md:hidden p-2 rounded-xl bg-brand-accent text-brand-primary focus:outline-none" aria-label="Toggle menu">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-brand-primary border-t border-brand-accent/20 px-4 pt-3 pb-5 space-y-2">
            <a href="<?= base_url('/') ?>" class="block px-4 py-2.5 font-display font-bold text-brand-accent rounded-xl hover:bg-black/10">
                <i class="fa-solid fa-house w-6"></i> Beranda
            </a>
            <a href="<?= base_url('/menu') ?>" class="block px-4 py-2.5 font-display font-bold text-brand-accent rounded-xl hover:bg-black/10">
                <i class="fa-solid fa-utensils w-6"></i> Menu & Sorting
            </a>
            <a href="<?= base_url('/reservasi') ?>" class="block px-4 py-2.5 font-display font-bold text-brand-accent rounded-xl hover:bg-black/10">
                <i class="fa-solid fa-calendar-check w-6"></i> Form Reservasi & Order
            </a>
            <a href="<?= base_url('/menu/tambah') ?>" class="block px-4 py-2.5 font-display font-bold text-brand-accent rounded-xl hover:bg-black/10">
                <i class="fa-solid fa-plus w-6"></i> Tambah Menu Baru
            </a>
            <a href="<?= base_url('/tentang') ?>" class="block px-4 py-2.5 font-display font-bold text-brand-accent rounded-xl hover:bg-black/10">
                <i class="fa-solid fa-circle-info w-6"></i> Cerita Resto
            </a>
            <div class="pt-2">
                <a href="<?= base_url('/reservasi') ?>" class="block w-full text-center py-3 bg-brand-accent text-brand-primary font-display font-black text-sm rounded-xl shadow-hard">
                    <i class="fa-solid fa-bell-concierge mr-1.5"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </header>

    <!-- Flash Messages (Notifikasi Sukses / Error) -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border-2 border-emerald-600 text-emerald-950 flex items-start gap-3 shadow-hard" role="alert">
                    <div class="p-1 rounded-lg bg-emerald-600 text-white mt-0.5">
                        <i class="fa-solid fa-check text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-sm text-emerald-900">Berhasil!</h4>
                        <p class="text-sm font-medium text-emerald-800"><?= esc(session()->getFlashdata('success')) ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-rose-50 border-2 border-rose-600 text-rose-950 shadow-hard" role="alert">
                    <div class="flex items-center gap-2 mb-2 font-display font-bold text-sm text-rose-900">
                        <i class="fa-solid fa-triangle-exclamation text-rose-600"></i>
                        <span>Terjadi Kesalahan Validasi:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-1 text-sm font-medium text-rose-800">
                        <?php foreach ((array) session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <!-- Dynamic Content Section -->
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Resto Triwiyatno (Warna Aksen #1F2937) -->
    <footer class="bg-brand-accent text-amber-100 border-t-2 border-brand-accent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                
                <!-- Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-brand-primary text-brand-accent flex items-center justify-center font-display font-black text-xl">
                            T
                        </div>
                        <span class="font-display font-black text-xl text-brand-primary tracking-tight">RESTO TRIWIYATNO</span>
                    </div>
                    <p class="text-sm text-amber-200/80 leading-relaxed">
                        Membawa cita rasa otentik <strong>Nasi Gemuk</strong> dan aneka mahakarya kuliner khas Provinsi Jambi ke tingkat modern dengan standar kualitas dan kelezatan premium.
                    </p>
                    <div class="flex items-center gap-3 text-brand-primary text-lg">
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-brand-primary hover:text-brand-accent flex items-center justify-center transition-colors"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://tiktok.com" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-brand-primary hover:text-brand-accent flex items-center justify-center transition-colors"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="https://facebook.com" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-brand-primary hover:text-brand-accent flex items-center justify-center transition-colors"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-brand-primary hover:text-brand-accent flex items-center justify-center transition-colors"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div>
                    <h4 class="font-display font-bold text-base text-brand-primary uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-sm"></i> Jam Buka
                    </h4>
                    <ul class="space-y-2 text-sm text-amber-200/90">
                        <li class="flex justify-between pb-1 border-b border-white/10">
                            <span>Senin - Jumat:</span>
                            <span class="font-semibold text-white">06.30 - 21.00 WIB</span>
                        </li>
                        <li class="flex justify-between pb-1 border-b border-white/10">
                            <span>Sabtu - Minggu:</span>
                            <span class="font-semibold text-white">06.00 - 22.00 WIB</span>
                        </li>
                        <li class="text-xs text-amber-300/80 pt-1">
                            *Sarapan Nasi Gemuk siap mulai jam 06.30 pagi hangat setiap hari.
                        </li>
                    </ul>
                </div>

                <!-- Kontak & Alamat -->
                <div>
                    <h4 class="font-display font-bold text-base text-brand-primary uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-map-pin text-sm"></i> Lokasi & Kontak
                    </h4>
                    <ul class="space-y-2.5 text-sm text-amber-200/90">
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-brand-primary mt-1"></i>
                            <span>Jl. Kolonel Abunjani No. 45, Sipin, Kota Jambi, Provinsi Jambi 36124</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-brand-primary"></i>
                            <span>(0741) 591-234 / 0812-3456-7890</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-brand-primary"></i>
                            <span>halo@triwiyatno.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Fitur Pintas -->
                <div>
                    <h4 class="font-display font-bold text-base text-brand-primary uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-link text-sm"></i> Navigasi Cepat
                    </h4>
                    <ul class="space-y-2 text-sm text-amber-200/90">
                        <li><a href="<?= base_url('/menu?sort=termurah') ?>" class="hover:text-brand-primary transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px]"></i> Menu Termurah</a></li>
                        <li><a href="<?= base_url('/menu?sort=unggulan') ?>" class="hover:text-brand-primary transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px]"></i> Menu Unggulan Chef</a></li>
                        <li><a href="<?= base_url('/reservasi') ?>" class="hover:text-brand-primary transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px]"></i> Form Reservasi & Pre-Order</a></li>
                        <li><a href="<?= base_url('/menu/tambah') ?>" class="hover:text-brand-primary transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px]"></i> Tambah Menu Kuliner Baru</a></li>
                        <li><a href="<?= base_url('/reservasi/riwayat') ?>" class="hover:text-brand-primary transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px]"></i> Riwayat Reservasi Masuk</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-amber-300/70">
                <p>&copy; <?= date('Y') ?> <strong>Resto Triwiyatno</strong>. Kuliner Khas Provinsi Jambi. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <span class="px-2.5 py-1 rounded-md bg-white/10 text-brand-primary font-bold">Ujian PFW 2026</span>
                    <span>Dibuat dengan CodeIgniter 4 + Tailwind CSS</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script toggle mobile menu -->
    <script>
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            var menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
