<div class="relative min-h-screen flex items-center justify-center p-4">
    <div class="absolute top-0 -left-4 w-72 h-72 bg-pkk-tosca rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 -right-4 w-72 h-72 bg-pkk-blue rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pkk-brightGreen rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="relative w-full max-w-md" data-aos="zoom-in" data-aos-duration="800">
        
        <div class="text-center mb-8">
            <a href="<?=base_url()?>" class="inline-block mb-4 transition-transform hover:scale-110">
                <img src="<?=base_url('assets/tampilanbaru/assets/images/logo.png')?>" alt="Logo" class="w-20 h-20 mx-auto drop-shadow-xl">
            </a>
            <h1 class="text-2xl font-extrabold text-pkk-navy dark:text-white tracking-tight">
                SIMPEL <span class="text-pkk-tosca">PKK</span>
            </h1>
            <p class="text-xs font-bold text-pkk-blue dark:text-pkk-brightGreen tracking-[0.2em] uppercase">
                KABUPATEN BANDUNG
            </p>
        </div>

        <div class="glass p-8 rounded-[2.5rem] shadow-2xl relative">
            <form action="" method="post" class="space-y-6">
                
                <?php if (messages()): ?>
                    <div class="text-red-500 font-bold text-sm text-center mb-4">
                        <?= messages() ?>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="block text-sm font-bold text-pkk-navy dark:text-gray-300 mb-2 ml-1">Username / NIP</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-pkk-tosca transition-colors">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="Masukkan username" value="<?= isset($username) ? htmlspecialchars($username) : ''; ?>" required
                            class="w-full pl-11 pr-4 py-3.5 bg-white/50 dark:bg-pkk-darkBg/50 border border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-pkk-tosca focus:border-transparent outline-none transition-all dark:text-white">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label class="text-sm font-bold text-pkk-navy dark:text-gray-300">Kata Sandi</label>
                        <a href="#" class="text-[11px] text-pkk-tosca hover:underline font-semibold">Lupa Password?</a>
                    </div>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-pkk-tosca transition-colors">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="••••••••" required 
                            class="w-full pl-11 pr-12 py-3.5 bg-white/50 dark:bg-pkk-darkBg/50 border border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-pkk-tosca focus:border-transparent outline-none transition-all dark:text-white">
                        <button type="button" onclick="togglePass()" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-pkk-tosca transition-colors">
                            <i class="fa-solid fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-2 px-1">
                    <input type="checkbox" name="remember" value="1" id="remember" class="w-4 h-4 rounded border-gray-300 text-pkk-tosca focus:ring-pkk-tosca transition-all cursor-pointer" <?= isset($remember) && $remember ? 'checked' : ''; ?>>
                    <label for="remember" class="text-xs text-gray-500 dark:text-gray-400 cursor-pointer select-none font-medium">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" 
                    class="w-full bg-pkk-navy dark:bg-pkk-blue hover:bg-pkk-tosca dark:hover:bg-pkk-tosca text-white font-bold py-4 rounded-2xl shadow-lg shadow-pkk-blue/20 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                    Masuk Ke Dashboard <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 text-center">
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Butuh bantuan akses? <a href="#" class="text-pkk-tosca font-bold hover:underline">Hubungi Admin</a>
                </p>
            </div>
        </div>

        <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="400">
            <a href="<?=base_url()?>" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-pkk-tosca transition-colors">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
