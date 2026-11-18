<!-- Navbar -->
<header class="{{ $isLight ? 'bg-[#f1f7f3] text-gray-800 border-emerald-200' : 'bg-[#121c18] text-white border-emerald-900/40' }} border-b sticky top-0 z-50 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        
        <!-- Brand Logo -->
        <div class="flex items-center gap-3">
            <div class="bg-amber-500 p-2 rounded-xl text-[#121c18] flex items-center justify-center font-bold shadow-md">
                <i data-lucide="mountain" class="w-6 h-6"></i>
            </div>
            <div>
                <!-- Teks HikeMate berubah dinamis: Gelap saat Light Mode, Putih saat Dark Mode -->
                <span class="text-xl font-extrabold tracking-tight {{ $isLight ? 'text-gray-900' : 'text-white' }} block leading-none">HikeMate</span>
                <span class="text-[10px] tracking-widest text-emerald-500 font-semibold uppercase">STORE & DIRECTORY</span>
            </div>
        </div>

        <!-- Right Actions -->
        <div class="flex items-center gap-4">
            
            <!-- Icon Shopping Bag -->
            <button class="relative {{ $isLight ? 'text-gray-600 hover:text-gray-900' : 'text-emerald-300 hover:text-white' }} transition p-2 cursor-pointer">
                <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                <span class="absolute top-1 right-1 bg-amber-500 text-[#121c18] text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
            </button>

            <!-- Tombol Login Admin -->
            <a href="#"
                class="{{ $isLight ? 'bg-white hover:bg-emerald-50 text-gray-700 border-gray-300' : 'bg-emerald-800/60 hover:bg-emerald-700/80 border-emerald-600/40 text-emerald-100' }} flex items-center gap-2 border px-4 py-2 rounded-xl text-sm font-medium transition shadow-sm">
                <i data-lucide="user" class="w-4 h-4 {{ $isLight ? 'text-emerald-600' : 'text-emerald-300' }}"></i> 
                <span>Login Admin</span>
            </a>

            <!-- Tombol Switch Tema (Sun / Moon) -->
            <div class="flex gap-2 items-center">
                <a href="{{ route('theme.change', 'light') }}" class="{{ $isLight ? 'bg-amber-100 text-amber-700 ring-2 ring-amber-400' : 'bg-gray-800 text-gray-400 hover:text-white' }} p-2.5 rounded-full shadow transition">
                    <i data-lucide="sun" class="w-4 h-4"></i>
                </a>

                <a href="{{ route('theme.change', 'dark') }}" class="{{ !$isLight ? 'bg-emerald-950 text-emerald-300 ring-2 ring-emerald-500' : 'bg-white text-gray-500 hover:text-gray-900' }} p-2.5 rounded-full shadow border border-gray-200 transition">
                    <i data-lucide="moon" class="w-4 h-4"></i>
                </a>
            </div>

        </div>
    </div>
</header>