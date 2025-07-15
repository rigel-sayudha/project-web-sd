<nav class="bg-white shadow flex items-center justify-between px-6 py-4 border-b border-gray-200">
    <div class="flex items-center space-x-4">
        <span class="font-bold text-green-700 text-xl">Admin Panel</span>
    </div>
    <div class="flex items-center space-x-4">
        <a href="{{ route('admin.profile') }}" class="text-gray-700 hover:text-green-700 font-semibold">Profil</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Logout</button>
        </form>
    </div>
</nav>
