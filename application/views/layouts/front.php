<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets/tampilanbaru/assets/images/logo.png') ?>">
    <title><?= isset($template['title']) ? $template['title'] . ' | ' : '' ?>SIMPEL PKK | Kabupaten Bandung</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    
    <!-- Icons & Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    },
                    colors: {
                        pkk: {
                            navy: '#001A33',
                            blue: '#005AAA',
                            tosca: '#008A8A',
                            emerald: '#006B6B',
                            gold: '#D4AF37',
                            brightGreen: '#4ADE80',
                            light: '#F8FAFC',
                            darkBg: '#0F172A',
                            darkCard: '#1E293B'
                        }
                    },
                    boxShadow: {
                        'soft': '0 20px 40px -15px rgba(0,0,0,0.05)',
                        'premium': '0 25px 50px -12px rgba(0, 138, 138, 0.15)',
                    }
                }
            }
        }
    </script>

    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #008A8A; border-radius: 10px; }

        .hero-slide {
            opacity: 0;
            transition: all 1.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: absolute;
            inset: 0;
            transform: scale(1.1);
        }
        .hero-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }
        .dark .glass-nav {
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .text-gradient {
            background: linear-gradient(to right, #008A8A, #005AAA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gradient Request: Tosca to Bright Green */
        .text-gradient-hero {
            background: linear-gradient(to right, #008A8A, #4ADE80);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Dark mode transition */
        body { transition: background-color 0.3s, color 0.3s; }
    </style>
    
    <?php echo $template['css']; ?>
    <?php echo $template['js_header']; ?>
</head>

<body class="bg-pkk-light text-gray-900 dark:bg-pkk-darkBg dark:text-gray-100 overflow-x-hidden">

<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full z-50 transition-all duration-500 glass-nav border-b border-white/20" id="navbar">
    
    <div class="w-full lg:max-w-7xl lg:mx-auto px-4 sm:px-6">
        
        <div class="flex justify-between items-center h-20">

            <!-- Brand -->
            <div class="flex items-center gap-2 flex-shrink-0 cursor-pointer" onclick="window.location.href='<?= base_url('welcome') ?>'">
                <img src="<?= base_url('assets/tampilanbaru/assets/images/logo.png') ?>" 
                     class="w-9 h-9 md:w-12 md:h-12 object-contain">
                <div class="leading-tight">
                    <span class="block font-extrabold text-sm md:text-lg text-pkk-navy dark:text-white">
                        SIMPEL <span class="text-pkk-tosca">PKK</span>
                    </span>
                    <span class="text-[8px] md:text-[10px] font-bold text-pkk-blue dark:text-pkk-brightGreen uppercase">
                        KAB. BANDUNG
                    </span>
                </div>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-2">

                <!-- Beranda -->
                <a href="<?= base_url('welcome') ?>" class="px-4 py-2 text-sm font-bold text-pkk-tosca bg-pkk-tosca/5 rounded-full">
                    Beranda
                </a>

                <!-- Profil -->
                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-pkk-tosca flex items-center gap-1">
                        Profil <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-pkk-darkCard rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-4 space-y-2">
                        <a href="<?= base_url('index.php/welcome/sejarah') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Sejarah</a>
                        <a href="<?= base_url('index.php/welcome/tupoksi') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Tugas Pokok dan Fungsi</a>
                        <a href="<?= base_url('index.php/welcome/visi') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Visi & Misi</a>
                        <a href="<?= base_url('index.php/welcome/pegawai') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Struktur Organisasi</a>
                        <a href="<?= base_url('index.php/welcome/seragam') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Ketentuan Seragam</a>
                    </div>
                </div>

                <!-- Program -->
                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-pkk-tosca flex items-center gap-1">
                        Program <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-pkk-darkCard rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-4 space-y-2">
                        <a href="<?= base_url('index.php/welcome/program_kerja') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Program Kerja</a>
                        <a href="<?= base_url('index.php/welcome/galeri') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Galeri Kegiatan</a>
                        <a href="<?= base_url('index.php/welcome/mars') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Mars PKK</a>
                        <a href="<?= base_url('index.php/welcome/dokument') ?>" class="block px-4 py-2 rounded-lg hover:bg-pkk-tosca/10">Dokumen</a>
                    </div>
                </div>

                <!-- Berita -->
                <a href="<?= base_url('index.php/welcome/berita') ?>" class="px-4 py-2 text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-pkk-tosca">
                    Berita
                </a>
                
                <div class="h-6 w-[1px] bg-gray-200 dark:bg-gray-700 mx-4"></div>

                <!-- Theme Toggle -->
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-pkk-navy dark:text-pkk-brightGreen mr-4">
                    <i id="theme-toggle-icon" class="fa-solid fa-moon text-lg"></i>
                </button>

                <!-- Login -->
                <a href="<?= base_url('index.php/auth/login') ?>" class="bg-pkk-navy dark:bg-pkk-blue text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-lg flex items-center gap-2">
                    <i class="fa-solid fa-fingerprint"></i> Login
                </a>
            </div>

            <!-- MOBILE NAV -->
            <div class="lg:hidden flex items-center gap-2 ml-auto pr-1 flex-shrink-0">
                <button id="theme-toggle-mobile" class="p-2 rounded-full text-pkk-navy dark:text-pkk-brightGreen">
                    <i class="fa-solid fa-moon text-lg"></i>
                </button>
                <button id="mobile-btn" class="p-2 rounded-full text-pkk-navy dark:text-white">
                    <i class="fa-solid fa-bars-staggered text-xl"></i>
                </button>
            </div>

        </div>
    </div>
    
    <!-- Mobile Menu Container -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white dark:bg-pkk-darkCard w-full p-4 border-t border-gray-200 dark:border-gray-800">
        <a href="<?= base_url('welcome') ?>" class="block py-2 text-pkk-navy dark:text-white font-bold">Beranda</a>
        <a href="<?= base_url('index.php/welcome/sejarah') ?>" class="block py-2 text-gray-600 dark:text-gray-300">Profil</a>
        <a href="<?= base_url('index.php/welcome/program_kerja') ?>" class="block py-2 text-gray-600 dark:text-gray-300">Program</a>
        <a href="<?= base_url('index.php/welcome/berita') ?>" class="block py-2 text-gray-600 dark:text-gray-300">Berita</a>
        <a href="<?= base_url('index.php/auth/login') ?>" class="block py-2 text-pkk-tosca font-bold mt-2">Login</a>
    </div>
</nav>

<!-- Main Content Area -->
<?php echo $template['content']; ?>

<!-- Footer -->
<footer class="bg-pkk-navy text-white pt-24 pb-12 relative mt-20">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pkk-tosca to-pkk-brightGreen"></div>
    
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">

            <!-- BRAND -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center p-2">
                        <img src="<?= base_url('assets/tampilanbaru/assets/images/logo.png') ?>" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold tracking-tight"><?= isset($footer->nama_dinas) ? $footer->nama_dinas : 'SIMPEL PKK' ?></h2>
                        <p class="text-[10px] font-bold text-pkk-brightGreen tracking-[0.3em] uppercase">
                            Kabupaten Bandung
                        </p>
                    </div>
                </div>

                <p class="text-white/60 max-w-sm leading-relaxed mb-10">
                    Platform pusat pelaporan dan informasi terintegrasi Tim Penggerak PKK Kabupaten Bandung. 
                    Memberdayakan keluarga, memajukan bangsa.
                </p>

                <div class="flex gap-4">
                    <?php if(isset($footer->socialmedia)): ?>
                        <?php foreach (json_decode($footer->socialmedia) as $key => $value): ?>
                            <a href="<?= $value ?>" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-pkk-tosca transition-all">
                                <i class="fab fa-<?= $key ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- NAVIGASI -->
            <div>
                <h3 class="text-lg font-bold mb-6">Navigasi</h3>
                <ul class="space-y-4 text-white/50 text-sm">
                    <li><a href="<?= base_url('welcome') ?>" class="hover:text-pkk-brightGreen transition">Beranda</a></li>
                    <li><a href="<?= base_url('index.php/welcome/sejarah') ?>" class="hover:text-pkk-brightGreen transition">Profil</a></li>
                    <li><a href="<?= base_url('index.php/welcome/program_kerja') ?>" class="hover:text-pkk-brightGreen transition">Program Kerja</a></li>
                    <li><a href="<?= base_url('index.php/welcome/berita') ?>" class="hover:text-pkk-brightGreen transition">Berita Terkini</a></li>
                </ul>
            </div>

            <!-- KONTAK -->
            <div>
                <h3 class="text-lg font-bold mb-6">Kontak</h3>
                <div class="text-white/50 text-sm space-y-4">
                    <div class="flex gap-3">
                        <i class="fa-solid fa-location-dot text-pkk-brightGreen"></i>
                        <p><?= isset($footer->alamat) ? $footer->alamat : 'Jl. Raya Soreang Km. 17, Soreang, Jawa Barat 40911' ?></p>
                    </div>
                    <div class="flex gap-3">
                        <i class="fa-solid fa-envelope text-pkk-brightGreen"></i>
                        <p><?= isset($footer->email) ? $footer->email : 'pkk@bandungkab.go.id' ?></p>
                    </div>
                     <div class="flex gap-3">
                        <i class="fa-solid fa-phone text-pkk-brightGreen"></i>
                        <p><?= isset($footer->telepon) ? $footer->telepon : '' ?></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- BOTTOM -->
        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
            <p class="text-[10px] text-white/30 uppercase tracking-widest">
                &copy; <?= date('Y') ?> TP PKK Kabupaten Bandung. Seluruh Hak Cipta Dilindungi.
            </p>

            <div class="flex items-center gap-2">
                <span class="text-[10px] font-bold text-white/20 uppercase">Created By:</span>
                <span class="bg-white/5 px-4 py-1 rounded-full text-[10px] font-bold text-pkk-gold">
                    DISKOMINFO Kab. Bandung
                </span>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    // Theme Toggle Logic
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleBtnMobile = document.getElementById('theme-toggle-mobile');
    const themeToggleIcon = document.getElementById('theme-toggle-icon');
    const html = document.documentElement;

    function toggleTheme() {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            if(themeToggleIcon) themeToggleIcon.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            if(themeToggleIcon) themeToggleIcon.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('theme', 'dark');
        }
    }

    // Init theme from localStorage
    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
        if(themeToggleIcon) themeToggleIcon.classList.replace('fa-moon', 'fa-sun');
    }

    if(themeToggleBtn) themeToggleBtn.onclick = toggleTheme;
    if(themeToggleBtnMobile) themeToggleBtnMobile.onclick = toggleTheme;

    // Navbar Scroll
    const nav = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 80) {
            nav.classList.add('py-2', 'shadow-xl');
        } else {
            nav.classList.remove('py-2', 'shadow-xl');
        }
    });

    // Mobile Menu
    const btn = document.getElementById('mobile-btn');
    const menu = document.getElementById('mobile-menu');
    if(btn && menu) {
        btn.onclick = () => menu.classList.toggle('hidden');
    }
</script>
<?php echo $template['js_footer']; ?>
</body>
</html>
