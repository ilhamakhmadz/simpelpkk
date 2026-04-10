<section class="relative pt-44 pb-32 bg-pkk-navy text-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-pkk-navy via-pkk-navy/60 to-pkk-navy/90 z-0"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-pkk-tosca/10 via-transparent to-transparent z-0"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full mb-8 backdrop-blur-md" data-aos="fade-down">
            <i class="fa-solid fa-music text-pkk-brightGreen text-xs"></i>
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase opacity-80">Lagu Penggerak</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight tracking-tight" data-aos="fade-up">Mars <span class="text-gradient-hero italic font-serif">PKK</span></h1>
        <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium opacity-90" data-aos="fade-up" data-aos-delay="200">
            Lagu kebanggaan yang menjadi penyemangat perjuangan kader pemberdayaan kesejahteraan keluarga.
        </p>
    </div>
</section>

<section class="py-24 bg-gray-50 dark:bg-pkk-darkBg font-sans relative">
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <div class="bg-white dark:bg-pkk-darkCard p-10 md:p-14 rounded-[2rem] shadow-soft border border-gray-100 dark:border-white/5 text-center relative overflow-hidden" data-aos="fade-up">
            
            <div class="absolute top-0 right-0 w-64 h-64 bg-pkk-tosca/5 rounded-full blur-3xl -z-10"></div>
            
            <audio controls class="w-full max-w-md mx-auto mb-10 shadow-md rounded-full bg-gray-100 dark:bg-gray-800 p-2">
                <source src="<?= base_url('uploads/mars.mp3') ?>" type="audio/mpeg">
                Browser Anda tidak mendukung elemen audio.
            </audio>

            <div class="dark:text-gray-300 text-lg md:text-xl leading-loose font-medium text-gray-700 italic">
                <?= $footer->mars_pkk ?>
            </div>
            
        </div>
    </div>
</section>
