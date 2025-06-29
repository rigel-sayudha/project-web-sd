<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Premium - Sekolah Dasar Berkualitas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Carousel responsive adjustments */
        @media (max-width: 640px) {
            .carousel-item img {
                height: 100vh;
            }
        }

        /* Animation for sections */
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="overflow-x-hidden">
    @include('partial.navbar')

   @include('partial.carousel')

    <!-- Visi & Misi Section -->
    <section id="visi-misi" class="py-12 md:py-16 px-4">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Visi & Misi</h2>
                
                <!-- Visi -->
                <div class="mb-8 md:mb-12 fade-in-up">
                    <div class="flex flex-col md:flex-row items-start md:items-center mb-4">
                        <div class="bg-blue-600 rounded-full p-2 mb-4 md:mb-0 md:mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-800">Visi Sekolah</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed md:ml-11">
                        "Menjadi lembaga pendidikan dasar unggulan yang menghasilkan generasi berkarakter, 
                        berprestasi akademik tinggi, dan berwawasan global dengan berlandaskan nilai-nilai luhur bangsa."
                    </p>
                </div>

                <div class="fade-in-up">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600 rounded-full p-2 mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-800">Misi Sekolah</h3>
                    </div>                    <ul class="space-y-4 ml-11">
                        <li class="flex items-start text-gray-600">
                            <div class="text-blue-600 mr-3">•</div>
                            Menyelenggarakan pendidikan karakter yang mengintegrasikan nilai-nilai luhur bangsa dalam setiap aktivitas pembelajaran dan kehidupan sekolah
                        </li>
                        <li class="flex items-start text-gray-600">
                            <div class="text-blue-600 mr-3">•</div>
                            Mengembangkan pembelajaran inovatif berbasis teknologi dan kearifan lokal untuk menciptakan pengalaman belajar yang bermakna dan kontekstual
                        </li>
                        <li class="flex items-start text-gray-600">
                            <div class="text-blue-600 mr-3">•</div>
                            Membangun lingkungan belajar yang inspiratif dan kondusif untuk mendukung pengembangan potensi akademik, sosial, dan emosional siswa secara optimal
                        </li>
                        <li class="flex items-start text-gray-600">
                            <div class="text-blue-600 mr-3">•</div>
                            Menjalin kerjasama strategis dengan berbagai pihak untuk pengembangan kompetensi siswa dan peningkatan kualitas pendidikan secara berkelanjutan
                        </li>
                        <li class="flex items-start text-gray-600">
                            <div class="text-blue-600 mr-3">•</div>
                            Membekali siswa dengan keterampilan abad 21, nilai-nilai kepemimpinan, dan karakter unggul untuk menjadi pribadi yang tangguh dan berdaya saing global
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi & Sambutan Section -->
    <section id="informasi-sambutan" class="py-12 md:py-16 bg-gradient-to-b from-white to-blue-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-12 mb-12 md:mb-20">
                <!-- Banner Image -->
                <div class="lg:col-span-3">
                    <div class="h-full relative rounded-xl overflow-hidden shadow-xl hover-card">
                        <img src="/images/banner-kartini.jpeg" alt="Banner" class="w-full h-[150px] md:h-[200px] object-cover">
                    </div>
                </div>                <!-- Content Side -->
                <div class="lg:col-span-9">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
                        <!-- Pengumuman -->
                        <div class="lg:col-span-1 bg-white rounded-xl shadow-lg p-6 hover-card">
                            <h2 class="text-2xl font-bold mb-6">Pengumuman</h2>
                            <div class="space-y-4">
                                <div class="border-b pb-4">
                                    <div class="flex justify-between mb-2">
                                        <h3 class="font-semibold text-gray-800">Penerimaan Siswa Baru 2025/2026</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">Pendaftaran dibuka 15 Mei - 30 Juni 2025</p>
                                </div>

                                <div class="border-b pb-4">
                                    <div class="flex justify-between mb-2">
                                        <h3 class="font-semibold text-gray-800">Jadwal Ujian Akhir Semester</h3>
                                       
                                    </div>
                                    <p class="text-sm text-gray-600">1-10 Juni 2025</p>
                                </div>

                                <div>
                                    <div class="flex justify-between mb-2">
                                        <h3 class="font-semibold text-gray-800">Pekan Olahraga dan Seni</h3>
                           
                                    </div>
                                    <p class="text-sm text-gray-600">20-25 Mei 2025</p>
                                </div>
                            </div>
                            <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 text-sm font-semibold">Lihat semua pengumuman →</a>                        
                        </div>                       
                        <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6 hover-card">
                            <h2 class="text-2xl font-bold mb-6">Sambutan Kepala Sekolah</h2>
                            <div class="flex flex-col md:flex-row md:space-x-8">
                                <div class="flex-shrink-0 mb-4 md:mb-0">
                                    <img src="/images/kepala-sekolah.jpg" alt="Kepala Sekolah" class="w-full md:w-56 h-56 object-cover rounded-lg shadow-md">
                                </div>
                                <div class="flex-grow">
                                    <p class="text-gray-600 text-justify">
                                        Selamat datang di SD Premium! Sebagai lembaga pendidikan yang berkomitmen pada keunggulan, 
                                        kami senantiasa berupaya memberikan pendidikan terbaik bagi putra-putri bangsa.
                                    </p>
                                    <div id="sambutan-full" class="hidden">
                                        <p class="text-gray-600 mt-4 text-justify">
                                            Kami percaya bahwa setiap anak memiliki potensi unik yang perlu dikembangkan 
                                            melalui pendekatan pembelajaran yang inovatif dan pembimbingan karakter yang intensif.
                                        </p>
                                        <p class="text-gray-600 mt-4 text-justify">
                                            Di SD Premium, kami tidak hanya fokus pada prestasi akademik, tetapi juga pembentukan 
                                            karakter dan pengembangan keterampilan abad 21. Dengan didukung oleh tenaga pendidik 
                                            yang profesional dan fasilitas pembelajaran modern, kami berkomitmen untuk menciptakan 
                                            lingkungan belajar yang inspiratif dan menyenangkan.
                                        </p>
                                        <p class="text-gray-600 mt-4 text-justify">
                                            Mari bergabung dengan keluarga besar SD Premium untuk bersama-sama mempersiapkan 
                                            generasi penerus bangsa yang cerdas, berkarakter, dan siap menghadapi tantangan global.
                                        </p>
                                        <div class="mt-4 text-right">
                                            <p class="font-semibold text-gray-800">Dr. Siti Rahayu, M.Pd.</p>
                                            <p class="text-gray-600">Kepala Sekolah SD Premium</p>
                                        </div>
                                    </div>
                                    <button onclick="toggleSambutan()" id="read-more" class="text-blue-600 hover:text-blue-800 font-semibold mt-4">
                                        Baca selengkapnya →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="py-12 md:py-16 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Berita Terkini</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="/images/news1.jpg" alt="Prestasi Olimpiade" class="w-full h-56 object-cover">
                      
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">12 Juni 2025</div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Siswa SD Premium Raih Medali Emas Olimpiade Matematika</h3>
                        <p class="text-gray-600 mb-4">Tim Olimpiade Matematika SD Premium berhasil meraih prestasi membanggakan dalam ajang Olimpiade Matematika Nasional 2025 yang diselenggarakan di Jakarta...</p>
                        <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
                            Baca selengkapnya 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="/images/news2.jpg" alt="Kegiatan Sekolah" class="w-full h-56 object-cover">
                    
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">10 Juni 2025</div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Festival Seni dan Budaya SD Premium 2025</h3>
                        <p class="text-gray-600 mb-4">Mengangkat tema "Budaya Nusantara", Festival Seni dan Budaya tahun ini menampilkan berbagai pertunjukan memukau dari siswa-siswi berbakat SD Premium...</p>
                        <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
                            Baca selengkapnya 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>


                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="/images/news3.jpg" alt="Fasilitas Baru" class="w-full h-56 object-cover">
               
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">8 Juni 2025</div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">Peresmian Laboratorium Digital Terpadu</h3>
                        <p class="text-gray-600 mb-4">SD Premium meresmikan Laboratorium Digital Terpadu yang dilengkapi dengan perangkat teknologi terkini untuk mendukung pembelajaran era digital...</p>
                        <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
                            Baca selengkapnya 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <section id="ekstrakurikuler" class="py-12 md:py-16 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Ekstrakurikuler</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
                <p class="mt-4 text-gray-600">Mengembangkan Bakat dan Minat Siswa</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- Pramuka -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-yellow-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pramuka</h3>
                    <p class="text-gray-600 text-sm">Membentuk karakter kepemimpinan dan kemandirian melalui kegiatan kepramukaan</p>
                </div>

                <!-- Robotika -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-blue-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Robotika</h3>
                    <p class="text-gray-600 text-sm">Mengembangkan kreativitas dan logika melalui pembelajaran robotika dan programming</p>
                </div>

                <!-- Seni Musik -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-purple-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Seni Musik</h3>
                    <p class="text-gray-600 text-sm">Mengasah bakat musikal melalui pembelajaran vokal dan instrumental</p>
                </div>

                <!-- English Club -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-green-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">English Club</h3>
                    <p class="text-gray-600 text-sm">Meningkatkan kemampuan berbahasa Inggris melalui aktivitas komunikatif yang menyenangkan</p>
                </div>

                <!-- Olahraga -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-red-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Olahraga</h3>
                    <p class="text-gray-600 text-sm">Membentuk jiwa sportivitas dan kesehatan fisik melalui berbagai cabang olahraga</p>
                </div>

                <!-- Seni Tari -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-pink-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Seni Tari</h3>
                    <p class="text-gray-600 text-sm">Melestarikan budaya melalui pembelajaran tari tradisional dan modern</p>
                </div>

                <!-- Klub Sains -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-indigo-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Klub Sains</h3>
                    <p class="text-gray-600 text-sm">Mengeksplorasi dunia sains melalui eksperimen dan proyek-proyek ilmiah</p>
                </div>

                <!-- Melukis -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-orange-500 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Melukis</h3>
                    <p class="text-gray-600 text-sm">Mengembangkan kreativitas dan ekspresi diri melalui seni lukis</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Hubungi Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-12">
                <!-- Map -->
                <div class="rounded-lg overflow-hidden shadow-lg h-[300px] md:h-[400px]">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2834485481613!2d106.82704871476885!3d-6.175392395527642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1623405821286!5m2!1sen!2sid"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        class="rounded-lg"
                    ></iframe>
                </div>

                <!-- Contact Info -->
                <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 hover-card">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Informasi Kontak</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-600 rounded-full p-3 mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Alamat</h4>
                                <p class="text-gray-600">Jl. Pendidikan No. 123<br>Jakarta Pusat, 10110</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-600 rounded-full p-3 mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">info@sdpremium.sch.id</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-600 rounded-full p-3 mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Telepon</h4>
                                <p class="text-gray-600">+62 21 1234 5678</p>
                                <p class="text-gray-600">Fax: +62 21 1234 5679</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
                    <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Kotak Saran</h3>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">No. Telepon</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            </div>
                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                                <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent" required></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                            Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('partial.footer')

    <script>
        function toggleSambutan() {
            const sambutanFull = document.getElementById('sambutan-full');
            const readMoreBtn = document.getElementById('read-more');
            
            if (sambutanFull.classList.contains('hidden')) {
                sambutanFull.classList.remove('hidden');
                readMoreBtn.textContent = '← Tutup';
            } else {
                sambutanFull.classList.add('hidden');
                readMoreBtn.textContent = 'Baca selengkapnya →';
            }
        }

        // Intersection Observer for fade-in-up animation
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in-up');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationDelay = '0.2s';
                        entry.target.style.opacity = '1';
                    }
                });
            }, {
                threshold: 0.1
            });

            fadeElements.forEach(element => {
                observer.observe(element);
            });

            // Existing carousel code
            // ...existing carousel JavaScript...
        });
    </script>
</body>
</html>