<aside class="w-64 bg-white shadow-lg min-h-screen">
    <div class="p-6 font-bold text-green-700 text-xl border-b border-gray-200">Admin Menu</div>
    <nav class="mt-4">
        <ul class="space-y-2">
            <li><a href="{{ route('admin.home') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Berita</a></li>
            <li><a href="{{ route('admin.leaderboard') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Leaderboard</a></li>
            <li><a href="{{ route('admin.registrations') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Pendaftaran</a></li>
            <li><a href="{{ route('admin.poster.index') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Banner Iklan</a></li>
            <li><a href="{{ route('admin.galeri.index') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Galeri</a></li>
            <li><a href="{{ route('admin.announcements') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Pengumuman</a></li>
            <li><a href="{{ route('admin.organization') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Struktur Organisasi</a></li>
            <li><a href="{{ route('admin.kotak-saran') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Kotak Saran</a></li>
            <li><a href="{{ route('admin.profile') }}" class="block px-6 py-2 hover:bg-green-50 rounded">Profil Admin</a></li>
        </ul>
    </nav>
</aside>
