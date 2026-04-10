<!-- HERO -->
<section class="relative pt-44 pb-32 bg-pkk-navy text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-pkk-navy via-pkk-navy/60 to-pkk-navy/90"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-pkk-tosca/10 via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full mb-8 backdrop-blur-md" data-aos="fade-down">
            <i class="fa-solid fa-sitemap text-pkk-brightGreen text-xs"></i>
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase opacity-80">Tim Penggerak PKK</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight tracking-tight" data-aos="fade-up">
            Struktur <span class="text-gradient-hero italic font-serif">Organisasi</span>
        </h1>

        <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium opacity-90" data-aos="fade-up" data-aos-delay="200">
            Daftar pengurus dan anggota pilar penggerak pemberdayaan masyarakat di Kabupaten Bandung.
        </p>

    </div>
</section>

<!-- GRID PEGAWAI -->
<section class="py-24 bg-pkk-light dark:bg-pkk-darkBg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php foreach ($pegawai as $data): ?>
            <div class="bg-white dark:bg-pkk-darkCard rounded-[2rem] overflow-hidden shadow-soft hover:shadow-premium transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-white/5" data-aos="fade-up">
                <div class="aspect-[4/5] overflow-hidden relative">
                    <img src="<?=base_url(base64_decode($data->gambar))?>" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-pkk-navy/80 via-transparent to-transparent"></div>
                </div>
                <div class="p-6 text-center -mt-16 relative z-10">
                    <div class="bg-white dark:bg-pkk-darkCard pt-4 px-2 rounded-t-3xl">
                        <h3 class="font-extrabold text-lg text-pkk-navy dark:text-white mb-1"><?= $data->nama ?></h3>
                        <p class="text-pkk-tosca text-xs font-bold uppercase tracking-widest mb-2"><?= $data->nama_jabatan ?></p>
                        <?php if($data->nip): ?>
                            <p class="text-gray-500 dark:text-gray-400 text-xs font-medium">NIP: <?= $data->nip ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if(!empty($footer->file_struktur_organisasi)): ?>
        <div class="mt-20 flex justify-center">
            <a target="_blank" href="<?=base_url(base64_decode($footer->file_struktur_organisasi))?>" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-pkk-tosca to-pkk-emerald text-white px-8 py-3.5 rounded-full font-bold shadow-lg shadow-pkk-tosca/30 hover:shadow-xl hover:shadow-pkk-tosca/40 hover:-translate-y-1 transition-all">
                <span>Unduh File Struktur Organisasi</span>
                <i class="fa-solid fa-download text-sm bg-white/20 p-1.5 rounded-full"></i>
            </a>
        </div>
        <?php endif; ?>

    </div>
</section>