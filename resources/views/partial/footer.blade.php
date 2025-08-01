<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- School Info & Social Media -->
            <div class="space-y-6">
                <div class="flex items-center space-x-4">
                    <img src="/images/logo.png" alt="SDIT SEMESTA CENDEKIA Logo" class="w-16 h-16">
                    <div>
                        <h3 class="text-xl font-bold">SDIT SEMESTA CENDEKIA</h3>
                    </div>
                </div>
                <p class="text-gray-400">Membentuk generasi unggul dengan pendidikan berkualitas dan karakter yang kuat melalui pembelajaran inovatif dan lingkungan yang mendukung.</p>
                <div class="pt-6 border-t border-gray-700">
                    <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-700 p-2 rounded-full hover:bg-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="#" class="bg-gray-700 p-2 rounded-full hover:bg-pink-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="bg-gray-700 p-2 rounded-full hover:bg-blue-800 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-lg font-semibold mb-4">Berita Sekolah Terbaru</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(($beritaSekolah ?? []) as $i => $berita)
                        @if($i < 4)
                        <article class="pb-4 border-b border-gray-700">
                            <h5 class="text-sm font-medium mb-2">{{ $berita->judul }}</h5>
                            <p class="text-sm text-gray-400">{{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 100) }}</p>
                            <a href="{{ route('berita.show', $berita->slug) }}" class="text-blue-400 text-sm hover:text-blue-300 mt-2 inline-block">Selengkapnya →</a>
                        </article>
                        @endif
                    @endforeach
                    @if(empty($beritaSekolah) || count($beritaSekolah) == 0)
                        <div class="text-gray-400 col-span-2">Belum ada berita sekolah yang dipublikasikan.</div>
                    @endif
                </div>
            </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 SDIT SEMESTA CENDEKIA. All rights reserved.</p>
        </div>
    </div>
</footer>