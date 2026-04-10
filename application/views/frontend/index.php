    <!-- Hero Section with 4 Slider Images -->
    <section class="relative h-screen min-h-[700px] flex items-center justify-center overflow-hidden">
        
        <!-- Background Slider -->
        <div class="absolute inset-0 z-0">
            <!-- Slide 1 -->
            <div class="hero-slide active">
                <div class="absolute inset-0 bg-gradient-to-r from-pkk-navy via-pkk-navy/60 to-transparent z-10"></div>
                <img src="<?= base_url() ?>assets/tampilanbaru/assets/images/slider/slide1.jpg" class="w-full h-full object-cover">
            </div>
            <!-- Slide 2 -->
            <div class="hero-slide">
                <div class="absolute inset-0 bg-gradient-to-r from-pkk-navy via-pkk-navy/60 to-transparent z-10"></div>
                <img src="<?= base_url() ?>assets/tampilanbaru/assets/images/slider/slide2.jpg" class="w-full h-full object-cover">
            </div>
            <!-- Slide 3 -->
            <div class="hero-slide">
                <div class="absolute inset-0 bg-gradient-to-r from-pkk-navy via-pkk-navy/60 to-transparent z-10"></div>
                <img src="<?= base_url() ?>assets/tampilanbaru/assets/images/slider/slide3.jpg" class="w-full h-full object-cover">
            </div>
            <!-- Slide 4 -->
            <div class="hero-slide">
                <div class="absolute inset-0 bg-gradient-to-r from-pkk-navy via-pkk-navy/60 to-transparent z-10"></div>
                <img src="<?= base_url() ?>assets/tampilanbaru/assets/images/slider/slide4.jpg" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-20 max-w-7xl mx-auto px-6 w-full pt-20">
            <div class="max-w-3xl" data-aos="fade-up">

                <!-- Label -->
                <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-full mb-8">
                    <span class="flex h-2 w-2 rounded-full bg-pkk-brightGreen animate-pulse"></span>
                    <span class="text-white text-[10px] md:text-xs font-bold tracking-[0.3em] uppercase">
                        Sistem Informasi Pelaporan PKK
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    <?= isset($footer->nama_dinas) ? $footer->nama_dinas : 'Mewujudkan Keluarga' ?> <br>
                    <span class="text-gradient-hero font-serif italic">Sejahtera & Mandiri</span>
                </h1>

                <!-- Description -->
                <p class="text-base md:text-lg text-gray-200 mb-10 max-w-2xl leading-relaxed opacity-90 font-medium">
                    Sinergi pemberdayaan masyarakat Kabupaten Bandung menuju kemajuan berbasis kearifan lokal melalui 10 Program Pokok PKK.
                </p>

                <!-- Buttons -->
                <div class="flex flex-row flex-wrap gap-4">
                    <a href="#data-pkk" class="bg-pkk-tosca hover:bg-pkk-emerald text-white px-6 py-3 rounded-full font-semibold shadow-xl transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        Program 
                        <i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                    <a href="#berita" class="bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/30 px-6 py-3 rounded-full font-semibold transition-all flex items-center justify-center">
                        Berita PKK
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Sambutan Section -->
    <section id="sambutan" class="py-24 relative overflow-hidden bg-white dark:bg-pkk-darkBg transition-colors">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                
                <!-- Image -->
                <div class="lg:w-1/2 relative" data-aos="fade-right">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-pkk-tosca/5 dark:bg-pkk-blue/5 rounded-full blur-3xl -z-10"></div>
                    
                    <img src="<?= base_url('assets\tampilanbaru\assets\images\sambutan.png') ?>" 
                         alt="<?= isset($sambutan->nama) ? $sambutan->nama : 'Ketua TP PKK' ?>" 
                         class="w-full h-auto object-cover relative z-10 transition-transform duration-500 hover:scale-105"
                         style="mask-image: linear-gradient(to bottom, black 85%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent 100%);">
                    
                    <!-- TEXT CENTER + ANIMATION -->
                    <div class="mt-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <p class="text-pkk-navy dark:text-white font-extrabold text-2xl mb-1 tracking-tight">
                            <?= isset($sambutan->nama) ? $sambutan->nama : 'Ketua TP PKK' ?>
                        </p>
                        <p class="text-pkk-tosca text-sm font-semibold tracking-widest uppercase animate-pulse">
                            <?= isset($sambutan->nama_jabatan) ? $sambutan->nama_jabatan : 'Ketua TP PKK Kabupaten Bandung' ?>
                        </p>
                    </div>
                </div>

                <!-- Text -->
                <div class="lg:w-1/2" data-aos="fade-left">
                    <h4 class="text-pkk-tosca dark:text-pkk-brightGreen font-bold tracking-[0.2em] uppercase text-sm mb-4">
                        Salam Hangat
                    </h4>

                    <h2 class="text-4xl md:text-5xl font-extrabold text-pkk-navy dark:text-white mb-8 leading-tight">
                        Sambutan Ketua <span class="text-gradient">PKK</span>
                    </h2>

                    <div class="space-y-6 text-gray-600 dark:text-gray-400 leading-relaxed text-justify">
                        <?= isset($footer->sambutan) ? $footer->sambutan : '<p>Selamat datang di website SIMPEL PKK.</p>' ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Data PKK Section -->
    <section id="data-pkk" class="py-24 bg-gray-50 dark:bg-pkk-darkCard/30 transition-colors">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <!-- HEADER -->
            <div class="mb-16" data-aos="fade-up">
                <img src="<?= base_url() ?>assets\tampilanbaru\assets\images\LogoPKK.png" 
                     alt="Logo Kab Bandung" 
                     class="w-20 h-auto mx-auto mb-6">

                <h2 class="text-3xl md:text-4xl font-extrabold text-pkk-navy dark:text-white mb-3 tracking-tight">
                    DATA PKK <br>KABUPATEN BANDUNG
                </h2>

                <div class="w-24 h-1 bg-pkk-tosca mx-auto mb-4 rounded-full"></div>

                <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto font-medium">
                    Pusat Informasi dan Statistik Program Pokok PKK secara Terpadu
                </p>
            </div>

            <!-- GRID CENTER -->
            <div class="flex flex-wrap justify-center gap-8">

                <!-- DATA UMUM -->
                <div class="max-w-sm w-full md:w-[45%] lg:w-[30%] group relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl border border-white dark:border-gray-800" data-aos="fade-up">
                    <img src="<?= base_url() ?>assets/img/dataumum.jpeg" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-pkk-navy/80 group-hover:bg-pkk-navy/70 transition-all"></div>
                    <div class="relative h-full flex flex-col items-center justify-center p-8">
                        <div class="w-16 h-16 rounded-2xl bg-cyan-500 flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-all">
                            <i class="fa-solid fa-database text-2xl"></i>
                        </div>
                        <h3 class="text-white font-extrabold text-2xl mb-3">DATA UMUM</h3>
                        <p class="text-gray-300 text-sm mb-8 opacity-90 px-4">
                            Data Administrasi Tim Penggerak PKK & Rekapitulasi Profil Kependudukan
                        </p>
                        <a href="<?= site_url('data/umum/index') ?>" class="px-8 py-2.5 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-white text-xs font-bold hover:bg-pkk-brightGreen hover:text-pkk-navy transition-all">
                            Eksplorasi
                        </a>
                    </div>
                </div>

                <!-- POKJA I -->
                <div class="max-w-sm w-full md:w-[45%] lg:w-[30%] group relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl border border-white dark:border-gray-800" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?= base_url() ?>assets/img/pokja1.jpeg" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-pkk-navy/80 group-hover:bg-pkk-navy/70 transition-all"></div>
                    <div class="relative h-full flex flex-col items-center justify-center p-8">
                        <div class="w-16 h-16 rounded-2xl bg-pink-500 flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-all">
                            <i class="fa-solid fa-heart-pulse text-2xl"></i>
                        </div>
                        <h3 class="text-white font-extrabold text-2xl mb-3">POKJA I</h3>
                        <p class="text-gray-300 text-sm mb-8 opacity-90 px-4">
                            Program Penghayatan Pengamalan Pancasila & Pembinaan Gotong Royong
                        </p>
                        <a href="<?= site_url('data/pokja1/index') ?>" class="px-8 py-2.5 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-white text-xs font-bold hover:bg-pkk-brightGreen hover:text-pkk-navy transition-all">
                            Eksplorasi
                        </a>
                    </div>
                </div>

                <!-- POKJA II -->
                <div class="max-w-sm w-full md:w-[45%] lg:w-[30%] group relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl border border-white dark:border-gray-800" data-aos="fade-up" data-aos-delay="200">
                    <img src="<?= base_url() ?>assets/img/pokja2.jpeg" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-pkk-navy/80 group-hover:bg-pkk-navy/70 transition-all"></div>
                    <div class="relative h-full flex flex-col items-center justify-center p-8">
                        <div class="w-16 h-16 rounded-2xl bg-green-500 flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-all">
                            <i class="fa-solid fa-graduation-cap text-2xl"></i>
                        </div>
                        <h3 class="text-white font-extrabold text-2xl mb-3">POKJA II</h3>
                        <p class="text-gray-300 text-sm mb-8 opacity-90 px-4">
                            Program Pendidikan, Keterampilan, Pengembangan & Berkoperasi
                        </p>
                        <a href="<?= site_url('data/pokja2/index') ?>" class="px-8 py-2.5 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-white text-xs font-bold hover:bg-pkk-brightGreen hover:text-pkk-navy transition-all">
                            Eksplorasi
                        </a>
                    </div>
                </div>

                <!-- POKJA III -->
                <div class="max-w-sm w-full md:w-[45%] lg:w-[30%] group relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl border border-white dark:border-gray-800" data-aos="fade-up" data-aos-delay="300">
                    <img src="<?= base_url() ?>assets/img/pokja3.jpeg" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-pkk-navy/80 group-hover:bg-pkk-navy/70 transition-all"></div>
                    <div class="relative h-full flex flex-col items-center justify-center p-8">
                        <div class="w-16 h-16 rounded-2xl bg-orange-500 flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-all">
                            <i class="fa-solid fa-utensils text-2xl"></i>
                        </div>
                        <h3 class="text-white font-extrabold text-2xl mb-3">POKJA III</h3>
                        <p class="text-gray-300 text-sm mb-8 opacity-90 px-4">
                            Program Pangan, Sandang, Perumahan, dan Tata Laksana RT
                        </p>
                        <a href="<?= site_url('data/pokja3/index') ?>" class="px-8 py-2.5 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-white text-xs font-bold hover:bg-pkk-brightGreen hover:text-pkk-navy transition-all">
                            Eksplorasi
                        </a>
                    </div>
                </div>

                <!-- POKJA IV -->
                <div class="max-w-sm w-full md:w-[45%] lg:w-[30%] group relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl border border-white dark:border-gray-800" data-aos="fade-up" data-aos-delay="400">
                    <img src="<?= base_url() ?>assets/img/pokja4.jpeg" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-pkk-navy/80 group-hover:bg-pkk-navy/70 transition-all"></div>
                    <div class="relative h-full flex flex-col items-center justify-center p-8">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-500 flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-all">
                            <i class="fa-solid fa-hospital-user text-2xl"></i>
                        </div>
                        <h3 class="text-white font-extrabold text-2xl mb-3">POKJA IV</h3>
                        <p class="text-gray-300 text-sm mb-8 opacity-90 px-4">
                            Program Kesehatan, Kelestarian Lingkungan & Perencanaan Sehat
                        </p>
                        <a href="<?= site_url('data/pokja4/index') ?>" class="px-8 py-2.5 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-white text-xs font-bold hover:bg-pkk-brightGreen hover:text-pkk-navy transition-all">
                            Eksplorasi
                        </a>
                    </div>
                </div>

                <!-- WEBSITE UTAMA -->
                <div class="max-w-sm w-full md:w-[45%] lg:w-[30%] group relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl border border-white dark:border-gray-800" data-aos="fade-up" data-aos-delay="500">
                    <img src="<?= base_url() ?>assets/img/bg.jpg" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-pkk-navy/80 group-hover:bg-pkk-navy/70 transition-all"></div>
                    <div class="relative h-full flex flex-col items-center justify-center p-8">
                        <div class="w-16 h-16 rounded-2xl bg-blue-500 flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-all">
                            <i class="fa-solid fa-home text-2xl"></i>
                        </div>
                        <h3 class="text-white font-extrabold text-2xl mb-3">WEBSITE UTAMA</h3>
                        <p class="text-gray-300 text-sm mb-8 opacity-90 px-4">
                            Kembali mengakses halaman Portal Publik Kabupaten Bandung
                        </p>
                        <a href="https://bandungkab.go.id" class="px-8 py-2.5 border border-white/30 bg-white/10 backdrop-blur-md rounded-full text-white text-xs font-bold hover:bg-pkk-brightGreen hover:text-pkk-navy transition-all">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section id="berita" class="py-24 dark:bg-pkk-darkBg transition-colors overflow-hidden">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12 gap-6">
                
                <div data-aos="fade-right">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-[2px] bg-pkk-tosca"></div>
                        <span class="text-pkk-tosca font-bold text-sm tracking-widest uppercase">
                            Update Informasi
                        </span>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-extrabold text-pkk-navy dark:text-white">
                        Berita <span class="text-gradient">PKK</span> Terkini
                    </h2>
                </div>

                <div class="flex items-center gap-3" data-aos="fade-left">
                    <button onclick="scrollNews('left')" class="w-12 h-12 rounded-full border flex items-center justify-center hover:bg-pkk-tosca hover:text-white transition">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button onclick="scrollNews('right')" class="w-12 h-12 rounded-full border flex items-center justify-center hover:bg-pkk-tosca hover:text-white transition">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- WRAPPER -->
            <div class="overflow-hidden">
                <!-- SLIDER -->
                <div id="news-container" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory px-2 pb-6">
                    <?php if(!empty($news)) { foreach ($news as $data_news) { ?>
                    <!-- ITEM -->
                    <div class="min-w-[85%] sm:min-w-[320px] md:min-w-[380px] snap-start bg-white rounded-[2.5rem] overflow-hidden group border shadow-sm transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl">
                        
                        <div class="h-56 overflow-hidden">
                            <img src="<?= base_url(base64_decode($data_news->gambar)) ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-3 group-hover:text-pkk-tosca transition">
                                <?= $data_news->judul ?>
                            </h3>

                            <p class="text-gray-500 text-sm mb-5">
                                <?php
                                $abstrak = strip_tags($data_news->isi, '<i>');
                                if (strlen($abstrak) > 80) {
                                    $abstrak = substr($abstrak, 0, strpos($abstrak, " ", 80)) . '...';
                                }
                                echo $abstrak;
                                ?>
                            </p>

                            <a href="<?=base_url('index.php/welcome/detail/').$data_news->slug?>" class="font-bold flex items-center gap-2 group-hover:gap-3 transition-all text-pkk-tosca">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>

        </div>
    </section>

    <script>
        // Hero Slider (4 Slides)
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        if(slides.length > 0) {
            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 5000);
        }

        // News Scroll
        function scrollNews(dir) {
            const container = document.getElementById('news-container');
            if(container) {
                const scrollAmount = container.offsetWidth * 0.8;
                container.scrollBy({ left: dir === 'left' ? -scrollAmount : scrollAmount, behavior: 'smooth' });
            }
        }
    </script>