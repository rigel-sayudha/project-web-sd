<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SDIT SEMESTA CENDEKIA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
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

        /* Card hover effects */
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .carousel-item {
            display: none;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-item.active {
            display: block;
        }

        .carousel-control {
            transition: background-color 0.3s ease;
        }

        .carousel-indicators button.active {
            background-opacity: 1;
        }
    </style>
</head>
<body class="overflow-x-hidden">
    @include('partial.navbar')

    <!-- Header Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Struktur Organisasi</h1>
                <div class="w-24 h-1 bg-green-600 mx-auto mb-4"></div>
                <p class="text-xl text-gray-600">Pengurus dan Tenaga Pendidik SDIT SEMESTA CENDEKIA</p>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Bagan (Gambar) -->
    <section class="py-4 md:py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center mb-10">
                <img src="{{ $organizationImage }}" alt="Bagan Struktur Organisasi" class="w-full max-w-3xl rounded-lg shadow border border-gray-200 object-contain bg-white">
                <span class="text-gray-500 text-sm mt-2">Bagan Struktur Organisasi SDIT SEMESTA CENDEKIA</span>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section (Personal) -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($strukturs as $struktur)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover-card fade-in-up">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $struktur->foto) }}" alt="{{ $struktur->nama }}" 
                             class="w-full h-[400px] object-cover object-center">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                            <h3 class="text-2xl font-bold text-white mb-1">{{ $struktur->nama }}</h3>
                            <p class="text-lg text-white/90">{{ $struktur->jabatan }}</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Informasi Personal</h4>
                            <div class="space-y-2">
                                <p class="text-gray-600">
                                    <span class="font-medium">NIP:</span> {{ $struktur->nip }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Pendidikan:</span> {{ $struktur->pendidikan }}
                                </p>
                                @if($struktur->bidang_keahlian)
                                <p class="text-gray-600">
                                    <span class="font-medium">Bidang Keahlian:</span> {{ $struktur->bidang_keahlian }}
                                </p>
                                @endif
                            </div>
                        </div>
                        @if($struktur->deskripsi)
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Tentang</h4>
                            <p class="text-gray-600">{{ $struktur->deskripsi }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partial.footer')

    <script>
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
        });

        // Carousel functionality
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.carousel');
            const items = carousel.querySelectorAll('.carousel-item');
            const indicators = carousel.querySelectorAll('.carousel-indicators button');
            let currentIndex = 0;

            function showSlide(index) {
                items.forEach(item => item.classList.remove('active'));
                indicators.forEach(indicator => indicator.classList.remove('active'));
                
                items[index].classList.add('active');
                indicators[index].classList.add('active');
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % items.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                showSlide(currentIndex);
            }

            // Event listeners
            carousel.querySelector('.next').addEventListener('click', nextSlide);
            carousel.querySelector('.prev').addEventListener('click', prevSlide);

            // Auto slide
            setInterval(nextSlide, 5000);
        });
    </script>
</body>
</html>
