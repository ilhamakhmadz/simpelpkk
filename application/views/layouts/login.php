<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?=base_url('assets/tampilanbaru/assets/images/logo.png')?>">
    <title><?php echo $template['title']; ?> | SIMPEL PKK Kabupaten Bandung</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
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
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .animate-blob { animation: blob 7s infinite; }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .dark .glass {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="bg-pkk-light dark:bg-pkk-darkBg transition-colors duration-300 font-sans overflow-hidden">

    <?= $template['content'] ?>

    <button onclick="toggleDarkMode()" class="fixed bottom-6 right-6 w-12 h-12 bg-white dark:bg-pkk-darkCard shadow-2xl rounded-full flex items-center justify-center text-pkk-navy dark:text-pkk-brightGreen transition-all hover:rotate-12 z-50">
        <i class="fa-solid fa-moon text-xl" id="dark-icon"></i>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function togglePass() {
            const passInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        function toggleDarkMode() {
            const html = document.documentElement;
            const icon = document.getElementById('dark-icon');
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                icon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'light');
            }
        }

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
            document.getElementById('dark-icon').classList.replace('fa-moon', 'fa-sun');
        }
    </script>
</body>
</html>
