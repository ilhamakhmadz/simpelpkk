<!-- HERO -->
<section class="relative pt-44 pb-32 bg-pkk-navy text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-pkk-navy via-pkk-navy/60 to-pkk-navy/90"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-pkk-tosca/10 via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full mb-8 backdrop-blur-md" data-aos="fade-down">
            <i class="fa-solid fa-images text-pkk-brightGreen text-xs"></i>
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase opacity-80">Momen & Memori</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight tracking-tight" data-aos="fade-up">
            Galeri <span class="text-gradient-hero italic font-serif">Kegiatan</span>
        </h1>

        <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium opacity-90" data-aos="fade-up" data-aos-delay="200">
            Dokumentasi pelaksanaan program pemberdayaan dan kesejahteraan keluarga di berbagai wilayah.
        </p>

    </div>
</section>

<!-- GALERI CONTENT -->
<section class="py-24 bg-gray-50 dark:bg-pkk-darkBg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-16" id="gallery-filters" data-aos="fade-up">
            <button class="px-6 py-2.5 rounded-full font-bold text-sm bg-pkk-tosca text-white shadow-lg filter-btn transition-all duration-300" data-filter="all">
                Semua
            </button>
            <?php foreach ($kategori_galeri as $doc): ?>
            <button class="px-6 py-2.5 rounded-full font-bold text-sm bg-white dark:bg-pkk-darkCard text-gray-600 dark:text-gray-300 border border-gray-100 dark:border-white/5 hover:border-pkk-tosca/30 hover:bg-pkk-tosca/10 hover:text-pkk-tosca dark:hover:text-pkk-brightGreen transition-all duration-300 filter-btn shadow-sm" data-filter="cat-<?=$doc->id?>">
                <?=$doc->nama_galeri?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Grid Images -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="gallery-grid">
            <?php foreach ($galeri as $docs): ?>
            <div class="gallery-item cat-<?=$docs->id_galeri?> group relative rounded-[2rem] overflow-hidden aspect-square shadow-soft hover:shadow-premium transition-all duration-300 border border-gray-100 dark:border-white/5" data-aos="zoom-in">
                
                <img src="<?= base_url(base64_decode($docs->file))?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-pkk-navy via-pkk-navy/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                    
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <p class="text-pkk-brightGreen text-[10px] font-extrabold uppercase tracking-[0.2em] mb-2 bg-pkk-brightGreen/10 inline-block px-3 py-1 rounded-full backdrop-blur-sm border border-pkk-brightGreen/20">
                            <?=$docs->nama_galeri?>
                        </p>
                        <h3 class="text-white font-extrabold text-2xl leading-tight mb-3"><?=$docs->nama?></h3>
                        <p class="text-white/70 text-xs font-medium flex items-center gap-2">
                            <i class="fa-regular fa-calendar"></i> <?=date("d/m/Y", strtotime($docs->created_date))?>
                        </p>
                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btns = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.gallery-item');

        btns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active button styling
                btns.forEach(b => {
                    b.classList.remove('bg-pkk-tosca', 'text-white', 'shadow-lg');
                    b.classList.add('bg-white', 'dark:bg-pkk-darkCard', 'text-gray-600', 'dark:text-gray-300', 'border', 'shadow-sm');
                });
                
                btn.classList.remove('bg-white', 'dark:bg-pkk-darkCard', 'text-gray-600', 'dark:text-gray-300', 'border', 'shadow-sm');
                btn.classList.add('bg-pkk-tosca', 'text-white', 'shadow-lg');

                const filter = btn.getAttribute('data-filter');
                items.forEach(item => {
                    if (filter === 'all' || item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
