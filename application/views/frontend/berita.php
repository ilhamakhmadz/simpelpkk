<!-- HERO -->
<section class="relative pt-44 pb-32 bg-pkk-navy text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-pkk-navy via-pkk-navy/60 to-pkk-navy/90"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-pkk-tosca/10 via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full mb-8 backdrop-blur-md" data-aos="fade-down">
            <i class="fa-solid fa-newspaper text-pkk-brightGreen text-xs"></i>
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase opacity-80">Pusat Informasi</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight tracking-tight" data-aos="fade-up">
            Berita <span class="text-gradient-hero italic font-serif">Terkini</span>
        </h1>

        <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium opacity-90" data-aos="fade-up" data-aos-delay="200">
            Dapatkan informasi terbaru mengenai kegiatan, program, dan prestasi Tim Penggerak PKK Kabupaten Bandung.
        </p>

    </div>
</section>

<!-- GRID BERITA -->
<section class="py-24 bg-gray-50 dark:bg-pkk-darkBg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($news as $data): ?>
            <div class="group bg-white dark:bg-pkk-darkCard rounded-[2rem] overflow-hidden shadow-soft hover:shadow-premium transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-white/5" data-aos="fade-up">
                
                <div class="relative h-60 overflow-hidden">
                    <img src="<?= base_url(base64_decode($data->gambar)) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-md text-pkk-tosca text-xs font-bold px-4 py-1.5 rounded-full shadow-sm">
                            <i class="fa-regular fa-calendar mr-1"></i> <?= $data->tgl_upload ?>
                        </span>
                    </div>
                </div>

                <div class="p-8 flex flex-col h-[calc(100%-15rem)]">
                    <h3 class="text-xl font-extrabold text-pkk-navy dark:text-white mb-4 line-clamp-2 leading-tight group-hover:text-pkk-tosca transition-colors">
                        <a href="<?=base_url('index.php/welcome/detail/').$data->slug?>"><?= $data->judul ?></a>
                    </h3>
                    
                    <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-6 flex-grow">
                        <?php
                            $abstrak = strip_tags($data->isi, '<i>');
                            if (strlen($abstrak) > 110) {
                                $abstrak = substr($abstrak, 0, strpos($abstrak, " ", 110)) . "...";
                            }
                            echo $abstrak;
                        ?>
                    </p>

                    <div class="flex items-center justify-between mt-auto pt-6 border-t border-gray-100 dark:border-white/10">
                        <div class="flex items-center gap-2 text-xs font-bold text-gray-500 dark:text-gray-400">
                            <i class="fa-solid fa-user-pen"></i> <?= $data->first_name . " " . $data->last_name ?>
                        </div>
                        <a href="<?=base_url('index.php/welcome/detail/').$data->slug?>" class="text-pkk-tosca dark:text-pkk-brightGreen text-xs font-bold uppercase tracking-widest hover:underline underline-offset-4">
                            Selengkapnya <i class="fa-solid fa-arrow-right-long ml-1"></i>
                        </a>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
