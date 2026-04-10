<!-- HERO -->
<section class="relative pt-44 pb-32 bg-pkk-navy text-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-pkk-navy via-pkk-navy/60 to-pkk-navy/90 z-0"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-pkk-tosca/10 via-transparent to-transparent z-0"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full mb-8 backdrop-blur-md" data-aos="fade-down">
            <i class="fa-solid fa-shirt text-pkk-brightGreen text-xs"></i>
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase opacity-80">Panduan Busana</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight tracking-tight" data-aos="fade-up">Ketentuan <span class="text-gradient-hero italic font-serif">Seragam</span></h1>
        <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl leading-relaxed font-medium opacity-90" data-aos="fade-up" data-aos-delay="200">
            Panduan baku tata cara berpakaian seragam bagi seluruh jajaran pengurus dan kader PKK Kabupaten Bandung sesuai pedoman yang berlaku.
        </p>
    </div>
</section>

<!-- Content -->
<section class="py-24 bg-gray-50 dark:bg-pkk-darkBg font-sans relative">
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        
        <!-- Tabs Nav -->
        <div class="flex flex-wrap justify-center gap-3 mb-12" id="seragam-tabs-nav" data-aos="fade-up">
            <button class="tab-btn active px-6 py-2.5 rounded-full font-bold text-sm shadow-lg transition-all duration-300 bg-pkk-tosca text-white" data-target="tab1">Seragam Resmi</button>
            <button class="tab-btn px-6 py-2.5 rounded-full font-bold text-sm border shadow-sm transition-all duration-300 bg-white dark:bg-pkk-darkCard text-gray-600 dark:text-gray-300 border-gray-100 dark:border-white/5 hover:border-pkk-tosca/30 hover:bg-pkk-tosca/10 hover:text-pkk-tosca dark:hover:text-pkk-brightGreen" data-target="tab2">Seragam Kerja</button>
            <button class="tab-btn px-6 py-2.5 rounded-full font-bold text-sm border shadow-sm transition-all duration-300 bg-white dark:bg-pkk-darkCard text-gray-600 dark:text-gray-300 border-gray-100 dark:border-white/5 hover:border-pkk-tosca/30 hover:bg-pkk-tosca/10 hover:text-pkk-tosca dark:hover:text-pkk-brightGreen" data-target="tab3">Seragam Lapangan</button>
        </div>

        <!-- Tabs Content -->
        <div id="seragam-tabs-content" class="bg-white dark:bg-pkk-darkCard p-8 rounded-[2rem] shadow-soft border border-gray-100 dark:border-white/5 relative" data-aos="zoom-in">
            <div id="tab1" class="tab-pane block opacity-100 transition-opacity duration-500">
                <img src="<?=base_url('uploads/seragam_resmi.PNG')?>" class="w-full rounded-[1.5rem] mx-auto drop-shadow-xl border border-gray-100 dark:border-white/5">
            </div>
            <div id="tab2" class="tab-pane hidden opacity-0 transition-opacity duration-500">
                <img src="<?=base_url('uploads/seragam_kerja.PNG')?>" class="w-full rounded-[1.5rem] mx-auto drop-shadow-xl border border-gray-100 dark:border-white/5">
            </div>
            <div id="tab3" class="tab-pane hidden opacity-0 transition-opacity duration-500">
                <img src="<?=base_url('uploads/seragam_lapangan.PNG')?>" class="w-full rounded-[1.5rem] mx-auto drop-shadow-xl border border-gray-100 dark:border-white/5">
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const btns = document.querySelectorAll('#seragam-tabs-nav .tab-btn');
    const panes = document.querySelectorAll('#seragam-tabs-content .tab-pane');

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            btns.forEach(b => {
                b.classList.remove('bg-pkk-tosca', 'text-white', 'shadow-lg');
                b.classList.add('bg-white', 'dark:bg-pkk-darkCard', 'text-gray-600', 'dark:text-gray-300', 'border', 'shadow-sm');
            });
            btn.classList.add('bg-pkk-tosca', 'text-white', 'shadow-lg');
            btn.classList.remove('bg-white', 'dark:bg-pkk-darkCard', 'text-gray-600', 'dark:text-gray-300', 'border', 'shadow-sm');

            panes.forEach(pane => {
                pane.classList.remove('block', 'opacity-100');
                pane.classList.add('hidden', 'opacity-0');
            });
            
            const target = document.getElementById(btn.getAttribute('data-target'));
            target.classList.remove('hidden', 'opacity-0');
            target.classList.add('block');
            setTimeout(() => { target.classList.add('opacity-100'); }, 50);
        });
    });
});
</script>
