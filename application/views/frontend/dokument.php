<section class="relative pt-44 pb-32 bg-pkk-navy text-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-pkk-navy via-pkk-navy/60 to-pkk-navy/90 z-0"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-pkk-tosca/10 via-transparent to-transparent z-0"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full mb-8 backdrop-blur-md" data-aos="fade-down">
            <i class="fa-solid fa-folder-open text-pkk-brightGreen text-xs"></i>
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase opacity-80">Repositori</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight tracking-tight" data-aos="fade-up">Dokumen <span class="text-gradient-hero italic font-serif">Publik</span></h1>
        <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium opacity-90" data-aos="fade-up" data-aos-delay="200">
            Akses dan unduh berbagai dokumen resmi, panduan, bahan tayang, dan laporan TP PKK Kabupaten Bandung.
        </p>
    </div>
</section>

<section class="py-24 bg-gray-50 dark:bg-pkk-darkBg font-sans relative">
    <div class="max-w-5xl mx-auto px-6 relative z-10">
        <?php foreach ($kategori_dokumen as $doc): ?>
            <div class="mb-12 bg-white dark:bg-pkk-darkCard p-8 rounded-[2rem] shadow-soft border border-gray-100 dark:border-white/5" data-aos="fade-up">
                <h3 class="text-2xl font-extrabold text-pkk-navy dark:text-white mb-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-pkk-tosca/10 dark:bg-pkk-tosca/20 flex items-center justify-center">
                        <i class="fa-solid fa-file-lines text-pkk-tosca text-xl"></i> 
                    </div>
                    <?= $doc->nama_dokumen ?>
                </h3>
                
                <div class="space-y-4">
                    <?php
                        $this->load->model("web/dokumen_model");
                        $all_doc = $this->dokumen_model->get_by_id_doc($doc->id);
                        if(empty($all_doc)):
                    ?>
                        <p class="text-gray-500 dark:text-gray-400 italic text-sm py-4">Belum ada dokumen di kategori ini.</p>
                    <?php else: foreach ($all_doc as $docs): ?>
                        <div class="group bg-gray-50 dark:bg-gray-800/50 p-5 rounded-2xl border border-gray-200/60 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-pkk-tosca/50 transition-all duration-300 hover:shadow-md">
                            <div class="flex items-center gap-4">
                                <i class="fa-regular fa-file-pdf text-red-500/80 text-2xl group-hover:text-red-500 transition-colors"></i>
                                <h4 class="font-bold text-gray-800 dark:text-gray-200 text-base md:text-lg"><?= $docs->nama ?></h4>
                            </div>
                            <a href="<?=base_url(base64_decode($docs->file))?>" target="_blank" class="inline-flex items-center justify-center gap-2 bg-pkk-navy dark:bg-pkk-darkBg hover:bg-pkk-tosca dark:hover:bg-pkk-tosca text-white px-6 py-2.5 rounded-full font-bold text-sm shadow-md transition-all sm:w-auto w-full">
                                <i class="fa-solid fa-download"></i> Unduh File
                            </a>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>