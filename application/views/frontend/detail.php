<section class="pt-28 pb-16">
<div class="max-w-5xl mx-auto px-4 sm:px-6">

    <!-- FOTO UTAMA -->
    <div class="rounded-3xl overflow-hidden shadow-xl mb-10">
        <img src="<?= base_url(base64_decode($detail->gambar)) ?>" 
             class="w-full h-[300px] md:h-[450px] object-cover">
    </div>

    <!-- JUDUL -->
    <h1 class="text-3xl md:text-5xl font-extrabold text-pkk-navy mb-6 leading-tight">
        <?= $detail->judul ?>
    </h1>

    <!-- META -->
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-10">
        <span><i class="fa-regular fa-calendar"></i> <?= $detail->tgl_upload ?></span>
        <span><i class="fa-regular fa-user"></i> <?= $detail->first_name . " " . $detail->last_name ?></span>
        <span><i class="fa-regular fa-eye"></i> <?= $detail->hit ?> Dilihat</span>
    </div>

</div>
</section>

<!-- ================= CONTENT ================= -->
<section class="pb-24 bg-white dark:bg-pkk-darkBg transition-colors relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-pkk-tosca/5 rounded-full blur-3xl -z-0"></div>

    <div class="max-w-4xl mx-auto px-6 relative z-10">

        <div class="space-y-10 text-gray-700 dark:text-gray-300 leading-relaxed text-lg">
            <?= $detail->isi ?>
        </div>

    </div>
</section>

<section class="pb-32 bg-white dark:bg-pkk-darkBg">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6" data-aos="fade-up">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-12 h-[2px] bg-pkk-tosca"></span>
                    <span class="text-pkk-tosca font-bold text-xs tracking-widest uppercase">Berita Terkait</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-pkk-navy dark:text-white">
                    Berita <span class="text-gradient">Terbaru</span>
                </h2>
            </div>
            <p class="text-gray-400 text-sm font-medium italic">Informasi ter-update dari kegiatan PKK —</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php if(isset($news)): foreach ($news as $data_news): ?>
            <div class="group relative overflow-hidden rounded-[2.5rem] shadow-lg aspect-square md:aspect-auto md:h-[450px]" data-aos="fade-up">
                <img src="<?= base_url(base64_decode($data_news->gambar)) ?>" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-pkk-navy/90 via-pkk-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8">
                    <p class="text-white font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <a href="<?=base_url('index.php/welcome/detail/').$data_news->slug?>"><?= $data_news->judul ?></a>
                    </p>
                    <p class="text-pkk-brightGreen text-xs font-medium uppercase tracking-widest translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">
                        <?= $data_news->tgl_upload ?>
                    </p>
                </div>
                <div class="absolute inset-4 border border-white/20 rounded-[2rem] pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <!-- Link Overlay -->
                <a href="<?=base_url('index.php/welcome/detail/').$data_news->slug?>" class="absolute inset-0 z-20"></a>
            </div>
            <?php endforeach; endif; ?>

        </div>

    </div>
</section>