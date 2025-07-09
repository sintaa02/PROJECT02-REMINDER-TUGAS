<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Reminder Tugas') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Figtree', sans-serif; scroll-behavior: smooth; }
        .gradient-bg {
            background: linear-gradient(90deg, #fbcfe8 0%, #bae6fd 100%);
        }
        .gradient-text {
        background: linear-gradient(90deg, #fbcfe8 0%, #bae6fd 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-2xl mr-1">📘</span>
                    <span class="text-2xl font-bold gradient-text" style="text-shadow: 2px 2px 0 #000000;">Remindy</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6 items-center">
                    <a id="link-beranda" href="#beranda" class="nav-link bg-gradient-to-r from-zinc-800 to-zinc-800 hover:from-pink-400 hover:to-purple-400 bg-clip-text text-transparent font-semibold transition">
                        Beranda
                    </a>
                    <a id="link-fitur" href="#fitur" class="nav-link bg-gradient-to-r from-zinc-800 to-zinc-800 hover:from-pink-400 hover:to-purple-400 bg-clip-text text-transparent font-semibold transition">
                        Fitur
                    </a>
                    <a id="link-kontak" href="#kontak" class="nav-link bg-gradient-to-r from-zinc-800 to-zinc-800 hover:from-pink-400 hover:to-purple-400 bg-clip-text text-transparent font-semibold transition">
                        Kontak
                    </a>

                    <div class="space-x-4">
                        @auth
                            <a href="{{ route('filament.admin.pages.dashboard') }}" class="text-from-pink-100 to-purple-100 font-semibold hover:underline">Dashboard</a>
                        @else
                            <a href="{{ route('filament.admin.auth.login') }}"class="bg-gradient-to-r from-pink-100 to-purple-100 hover:from-pink-300 hover:to-purple-300 text-black font-bold py-2 px-6 rounded-lg shadow transition">Login</a>
                            {{-- <a href="{{ route('filament.admin.auth.register')}}"class="bg-gradient-to-r from-pink-100 to-purple-100 hover:from-pink-300 hover:to-purple-300 text-black font-bold py-2 px-6 rounded-lg shadow transition">Sign UP</a> --}}
                        @endauth
                    </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="py-16 bg-gradient-to-r from-pink-100 to-blue-100">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 gradient-text leading-tight" style="text-shadow: 4px 4px 0 #27272a;">
                    Kelola Tugasmu <span class="gradient-text" style="text-shadow: 4px 4px 0 #27272a;">Lebih Mudah</span>
                </h1>
                <p class="text-lg md:text-xl text-zinc-500 mb-8 max-w-xl">
                    Remindy merupakan aplikasi manajemen tugas yang dirancang untuk memudahkan mahasiswa mengatur deadline, mendapatkan notifikasi tepat waktu, dan melacak progres secara visual.
                </p>
                <a href="{{ route('filament.admin.auth.register') }}"
                class="inline-block bg-white text-black font-bold px-8 py-3 rounded-lg shadow-lg transition text-lg
                        hover:bg-gradient-to-r hover:from-pink-300 hover:to-purple-300 hover:text-black">
                Mulai Sekarang
                </a>

            </div>
            <div class="flex-1 flex justify-center">
                <img src="tugas.png" class="w-180 h-120">
            </div>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section id="fitur" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10 gradient-text" style="text-shadow: 4px 4px 0 #000000;">FITUR UNGGULAN</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-blue-50 rounded-2xl p-6 flex flex-col items-center shadow hover:shadow-lg transition" data-aos="fade-up">
                    <i class="fas fa-pencil-square fa-2x text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Tugas</h3>
                    <p class="text-gray-500 text-center">Ini merupakan fitur utama dimana kita bisa mengelola daftar tugas, deadline, dan status penyelesaian untuk setiap mata kuliah.</p>
                </div>
                <div class="bg-green-50 rounded-2xl p-6 flex flex-col items-center shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-book fa-2x text-green-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Mata Kuliah</h3>
                    <p class="text-gray-500 text-center">Lihat daftar mata kuliah, kode, sks, deskripsi dan juga dosen pengampu untuk mata kuliah tersebut.</p>
                </div>
                <div class="bg-yellow-50 rounded-2xl p-6 flex flex-col items-center shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-address-book fa-2x text-yellow-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Dosen</h3>
                    <p class="text-gray-500 text-center">Lihat informasi mengenai dosen pengampu untuk setiap mata kuliah.</p>
                </div>
                <div class="bg-purple-50 rounded-2xl p-6 flex flex-col items-center shadow hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-bookmark fa-2x text-purple-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Kategori</h3>
                    <p class="text-gray-500 text-center">Lihat setiap jenis mata kuliah yang di tandai dengan label warna untuk memudahkan identifikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Motivasi -->
     <section class="py-12 gradient-bg">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <blockquote class="text-xl italic text-zinc-800 mb-4">“Kesuksesan adalah hasil dari perencanaan yang baik dan eksekusi yang konsisten. Mulailah dengan mengelola tugasmu hari ini!”</blockquote>
            <div class="flex justify-center items-center gap-2">
                <span class="font-semibold text-zinc-800">@Kelompok 5</span>
            </div>
        </div>
    </section>

    <!-- Kelompok -->
    <section id="kontak" class="flex justify-center items-center min-h-screen bg-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mb-10 gradient-text" style="text-shadow: 4px 4px 0 #000000;">OUR TEAM</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Our Leader -->
                    <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow transition hover:shadow-lg hover:-translate-y-1 hover:bg-gradient-to-r hover:from-pink-100 hover:to-blue-100 duration-300" data-aos="fade-up">
                        <img src="sinta.jpg" class="w-30 h-30 flex rounded-full image-center">
                        <div class="flex justify-center items-center gap-2 space-x-3 mt-3 text-xl text-gray-600 text-center">
                            <a href="https://www.instagram.com/ssnta.ky/"><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/sintaa02"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/sinta-sinta-63989a345/"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-center">Sinta</h3>
                        <p class="text-gray-500 text-center">0110124056</p>
                    </div>

                    <!-- Member 1 -->
                    <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow transition hover:shadow-lg hover:-translate-y-1 hover:bg-gradient-to-r hover:from-pink-100 hover:to-blue-100 duration-300" data-aos="fade-up" data-aos-delay="100">
                        <img src="restu.jpg" class="w-30 h-30 flex rounded-full image-center">
                        <div class="flex justify-center items-center gap-2 space-x-3 mt-3 text-xl text-gray-600 text-center">
                            <a href="https://www.instagram.com/rstyunzr?igsh=MW1jc3l1eGVwcjNzMA=="><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/RestuYunissa"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/restu-yunissa-zahirah-971337308"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-center">Restu Yunissa Zahirah</h3>
                        <p class="text-gray-500 text-center">0110124165</p>
                    </div>

                    <!-- Member 2 -->
                    <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow transition hover:shadow-lg hover:-translate-y-1 hover:bg-gradient-to-r hover:from-pink-100 hover:to-blue-100 duration-300" data-aos="fade-up" data-aos-delay="200">
                        <img src="caca.png" class="w-30 h-30 flex rounded-full image-center">
                        <div class="flex justify-center items-center gap-2 space-x-3 mt-3 text-xl text-gray-600 text-center">
                            <a href="https://www.instagram.com/slsablla_09?igsh=MTh2c25wYmJkN21zcQ%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/Salsabila993"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/salsa-billaaa-9a8481344?trk=contact-info"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-center">Salsabila</h3>
                        <p class="text-gray-500 text-center">0110124138</p>
                    </div>

                    <!-- Member 3 -->
                    <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow transition hover:shadow-lg hover:-translate-y-1 hover:bg-gradient-to-r hover:from-pink-100 hover:to-blue-100 duration-300" data-aos="fade-up" data-aos-delay="300">
                        <img src="okta.jpg" class="w-30 h-30 flex rounded-full image-center">
                        <div class="flex justify-center items-center gap-2 space-x-3 mt-3 text-xl text-gray-600 text-center">
                            <a href="https://www.instagram.com/oktaftra_?igsh=cmdzamptc3NrY2l0"><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/oktaftra"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/oktafitria-ramadhani-8a83b1309?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-center">Oktafitria Ramadhani</h3>
                        <p class="text-gray-500 text-center">0110124199</p>
                    </div>

                    <!-- Member 4 -->
                    <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow transition hover:shadow-lg hover:-translate-y-1 hover:bg-gradient-to-r hover:from-pink-100 hover:to-blue-100 duration-300" data-aos="fade-up" data-aos-delay="400">
                        <img src="naylla.jpg" class="w-30 h-30 flex rounded-full image-center">
                        <div class="flex justify-center items-center gap-2 space-x-3 mt-3 text-xl text-gray-600 text-center">
                            <a href="https://www.instagram.com/naygstn_?igsh=MXN3eXpiZDMzazN4YQ=="><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/rahmahervina"><i class="fab fa-github"></i></a>
                            <a href="https://id.linkedin.com/in/rahma-hervina-9a1880280"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-center">Naylla Agustina Putria</h3>
                        <p class="text-gray-500 text-center">0110124227</p>
                    </div>

                    <!-- Member 5 -->
                    <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow transition hover:shadow-lg hover:-translate-y-1 hover:bg-gradient-to-r hover:from-pink-100 hover:to-blue-100 duration-300" data-aos="fade-up" data-aos-delay="500">
                        <img src="rahma.jpg" class="w-30 h-30 flex rounded-full image-center">
                        <div class="flex justify-center items-center gap-2 space-x-3 mt-3 text-xl text-gray-600 text-center">
                            <a href="https://www.instagram.com/rhm.dwsrr?igsh=MXRvaHZlZG1sZXp0ZA=="><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/rahmahervina"><i class="fab fa-github"></i></a>
                            <a href="http://www.linkedin.com/in/naylla-agustina-2aa679373"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 text-center">Rahma Hervina Dwi Lestari</h3>
                        <p class="text-gray-500 text-center">0110124120</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-white border-t mt-8">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm">
            <div>&copy; {{ date('Y') }} Remindy. By Kelompok 5.</div>
            <div class="flex gap-4 mt-2 md:mt-0">
                <a href="https://github.com/" target="_blank" class="hover:text-blue-600">GitHub</a>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

</body>
</html>
