@extends('layouts.app')

@section('content')
    @php

    @endphp

    <div class="{{ $isLight ? 'bg-[#f1f7f3] text-gray-800' : 'bg-[#121c18] text-white' }} min-h-screen">

        <!-- HERO SECTION -->
        <section class="relative bg-[#182621] py-16 lg:py-24 overflow-hidden border-b border-emerald-900/40">

            <div class="absolute inset-0 z-0 opacity-30 mix-blend-overlay">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1920&q=80"
                    alt="Mountain Background" class="w-full h-full object-cover">
            </div>

            <div class="absolute inset-0 bg-gradient-to-r from-[#121c18] via-[#121c18]/80 to-transparent z-0"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">

                <div
                    class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <i data-lucide="tent" class="w-3.5 h-3.5"></i>
                    RENTAL ALAT PENDAKIAN
                </div>

                <div class="space-y-3 max-w-2xl">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white">
                        Jelajahi Alam, <br>
                        <span class="text-emerald-400">Siapkan Perlengkapanmu</span>
                    </h1>

                    <p class="text-emerald-100/80 text-sm sm:text-base leading-relaxed">
                        Sewa berbagai alat pendakian dengan kualitas terjamin, terawat,
                        dan siap digunakan.
                    </p>
                </div>

                <!-- SEARCH -->
                <!-- SEARCH BAR FORM -->
                <form action="" method="GET"
                    class="{{ $isLight ? 'bg-white/90 border-emerald-300 shadow-lg text-gray-800' : 'bg-[#182621]/90 border-emerald-600/30 shadow-xl text-white' }} backdrop-blur-md p-2 rounded-2xl border max-w-xl flex items-center transition-colors">

                    <!-- Jika ada filter tanggal yang sedang aktif, kita sertakan juga agar tidak ikut terhapus saat melakukan pencarian -->
                    @if (request('tanggal_sewa'))
                        <input type="hidden" name="tanggal_sewa" value="{{ request('tanggal_sewa') }}">
                    @endif

                    <div class="pl-3 {{ $isLight ? 'text-emerald-600' : 'text-emerald-400' }}">
                        <i data-lucide="search" class="w-5 h-5"></i>
                    </div>

                    <!-- Berikan name="cari" agar terbaca oleh request('cari') di Controller/Blade PHP -->
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Cari alat pendakian (contoh: tenda, carrier, sleeping bag)..."
                        class="w-full bg-transparent border-none {{ $isLight ? 'text-gray-900 placeholder:text-gray-400' : 'text-white placeholder:text-emerald-300/50' }} px-3 py-2 text-sm focus:outline-none">

                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition shadow-md cursor-pointer shrink-0">
                        Cari
                    </button>
                </form>

            </div>
        </section>


        <!-- MAIN CONTENT -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10 w-full">

            <!-- KATEGORI -->
            <section class="space-y-4">

                <div>
                    <h2 class="text-xl font-bold {{ $isLight ? 'text-gray-900' : 'text-white' }}">
                        Kategori Alat Pendakian
                    </h2>

                    <p class="text-xs sm:text-sm {{ $isLight ? 'text-gray-500' : 'text-emerald-100/70' }}">
                        Pilih kategori untuk menemukan perlengkapan yang kamu butuhkan.
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">

                    @foreach ($categories as $category)
                        {{-- DEFINE VARIABEL DISINI SEBELUM DIGUNAKAN --}}
                        @php
                            $isActive = request('category') === $category['slug'];
                        @endphp

                        <a href="{{ route('home', array_merge(request()->only('tanggal_sewa'), ['category' => $category['slug']])) }}"
                            class="{{ $isActive
                                ? 'border-emerald-500 bg-emerald-950/40 ring-2 ring-emerald-500/50'
                                : ($isLight
                                    ? 'bg-white border-gray-200 hover:border-emerald-400 shadow-sm'
                                    : 'bg-[#182621] border-emerald-900/60 hover:border-emerald-500/50 shadow-md') }}
                                     border rounded-2xl p-5 text-center transition group flex flex-col items-center justify-center gap-3">

                            <div
                                class="{{ $isLight ? 'bg-emerald-50' : 'bg-emerald-950/60 group-hover:bg-emerald-900/60' }} text-emerald-600 p-3 rounded-xl transition">
                                <i data-lucide="{{ $category['icon'] }}" class="w-6 h-6"></i>
                            </div>

                            <div>
                                <h4 class="text-sm font-semibold {{ $isLight ? 'text-gray-800' : 'text-white' }}">
                                    {{ $category['name'] }}
                                </h4>

                                <span class="text-[11px] {{ $isLight ? 'text-gray-500' : 'text-emerald-300/70' }}">
                                    {{ $category['total'] }}
                                </span>
                            </div>
                        </a>
                    @endforeach

                </div>
            </section>


            <!-- KATALOG PRODUK -->
            <section class="space-y-4">

                <!-- HEADER KATALOG -->
                <div
                    class="{{ $isLight ? 'bg-[#e8f1eb] border-emerald-200' : 'bg-[#182621] border-emerald-900/60' }} flex flex-col md:flex-row md:items-center justify-between gap-4 p-4 rounded-2xl border">

                    <div>
                        <h2 class="text-xl font-bold {{ $isLight ? 'text-gray-900' : 'text-white' }}">
                            Katalog Alat Pendakian
                        </h2>

                        <p class="text-xs sm:text-sm {{ $isLight ? 'text-gray-500' : 'text-emerald-100/70' }}">
                            Daftar perlengkapan pendakian yang tersedia untuk disewa.
                        </p>
                    </div>


                    <div class="flex flex-wrap items-center gap-3">

                        @php
                            $tanggalSewa = request('tanggal_sewa');
                        @endphp

                        <!-- 1. Banner Warning (Muncul hanya jika belum ada tanggal di URL) -->
                        <div id="warning-banner"
                            class="flex items-center gap-2 bg-amber-500/10 border border-amber-500/30 text-amber-600 text-xs px-3 py-2 rounded-xl w-fit {{ $tanggalSewa ? 'hidden' : '' }}">
                            <i data-lucide="alert-circle" class="w-4 h-4 text-amber-500 shrink-0"></i>
                            <span>Tentukan Tanggal Sewa Terlebih Dahulu</span>
                        </div>



                        <!-- 3. Form & Tombol Filter -->
                        <form action="" method="GET" class="flex flex-wrap items-center gap-3" id="filter-form">

                            <!-- Input Tersembunyi untuk URL PHP -->
                            <input type="hidden" name="tanggal_sewa" id="input-tanggal-sewa" value="{{ $tanggalSewa }}">

                            <!-- Container Date Picker Dropdown -->
                            <div class="relative">

                                <!-- Tombol Trigger Utama -->
                                <button type="button" id="dropdown-btn"
                                    class="{{ $isLight ? 'bg-white border-gray-300 text-gray-700 hover:bg-emerald-50' : 'bg-[#121c18] border-emerald-600/40 text-emerald-200 hover:bg-emerald-900/60' }} border text-xs font-medium px-4 py-2.5 rounded-xl flex items-center gap-2 transition shadow-sm cursor-pointer select-none">
                                    <i data-lucide="calendar" class="w-4 h-4 text-emerald-600"></i>
                                    <span id="button-text">{{ $tanggalSewa ? $tanggalSewa : 'Pilih Tanggal Sewa' }}</span>
                                    <i id="chevron-icon" data-lucide="chevron-down"
                                        class="w-3.5 h-3.5 text-gray-400 transition-transform duration-200"></i>
                                </button>

                                <!-- Popover Kalender Dropdown -->
                                <div id="calendar-dropdown"
                                    class="absolute left-0 mt-2 w-72 bg-white rounded-3xl shadow-2xl border border-gray-100 p-5 z-[999] text-gray-700 hidden">

                                    <!-- Header Navigasi Bulan & Tahun -->
                                    <div class="flex items-center justify-between mb-4 px-2">
                                        <button type="button" id="prev-month"
                                            class="p-1 hover:bg-gray-100 rounded-full transition">
                                            <i data-lucide="chevron-left" class="w-4 h-4 text-gray-800"></i>
                                        </button>
                                        <h3 id="month-year-title"
                                            class="text-xs font-bold tracking-wider text-gray-900 uppercase">NOVEMBER 2026
                                        </h3>
                                        <button type="button" id="next-month"
                                            class="p-1 hover:bg-gray-100 rounded-full transition">
                                            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-800"></i>
                                        </button>
                                    </div>

                                    <!-- Nama-Nama Hari -->
                                    <div
                                        class="grid grid-cols-7 gap-1 text-center mb-2 text-xs font-medium text-gray-400 select-none">
                                        <span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
                                    </div>

                                    <!-- Grid Tanggal -->
                                    <div id="calendar-grid"
                                        class="grid grid-cols-7 gap-y-1 gap-x-0 text-center text-xs font-medium">
                                    </div>

                                    <!-- Tombol Lanjut -->
                                    <div class="mt-4 flex justify-end">
                                        <button type="button" id="btn-lanjut"
                                            class="bg-[#8cf8cd] hover:bg-[#6ef5be] text-emerald-950 font-bold text-xs px-5 py-2 rounded-full transition shadow-sm uppercase tracking-wider cursor-pointer">
                                            LANJUT
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Semua Filter (Reset Murni URL) -->
                            <a href="{{ route('home', request()->only('tanggal_sewa')) }}"
                                class="{{ $isLight
                                    ? 'bg-white border-gray-300 text-gray-700 hover:bg-emerald-50'
                                    : 'bg-[#121c18] border-emerald-600/40 text-emerald-200 hover:bg-emerald-900/60' }}
        border text-xs font-medium px-4 py-2.5 rounded-xl flex items-center gap-2 transition shadow-sm cursor-pointer">

                                <i data-lucide="sliders-horizontal" class="w-3.5 h-3.5 text-gray-500"></i>
                                <span>Semua Filter</span>
                            </a>
                        </form>
                    </div>
                </div>


                <!-- Judul Section Kategori Berwarna Oranye -->
                @php
                    $tanggalSewaAktif = request('tanggal_sewa');
                @endphp

                @if ($tanggalSewaAktif)
                    <div class="mb-6">
                        <h3
                            class="text-3xl font-extrabold tracking-wide text-amber-500 uppercase font-serif drop-shadow-sm">
                            {{ $selectedCategory ? ucfirst($selectedCategory) : 'Semua Kategori' }}
                        </h3>
                        <div class="w-24 h-1 bg-amber-500/60 rounded-full mt-1"></div>
                    </div>
                @else
                @endif

                <!-- List Produk -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    @foreach ($products as $index => $product)
                        <div
                            class="{{ $isLight ? 'bg-white border-gray-200 hover:border-emerald-400 shadow-sm' : 'bg-[#182621] border-emerald-900/60 hover:border-emerald-600/40 shadow-md' }} border rounded-2xl p-4 flex flex-col justify-between transition">

                            <div class="flex items-start gap-4">
                                <!-- Gambar Produk -->
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                    class="w-24 h-24 rounded-xl object-cover {{ $isLight ? 'border-gray-200' : 'border-emerald-900/80' }} border shrink-0">

                                <!-- Detail Singkat -->
                                <div class="flex-1 space-y-1">
                                    <h4 class="text-base font-bold {{ $isLight ? 'text-gray-900' : 'text-white' }}">
                                        {{ $product['name'] }}
                                    </h4>

                                    <div
                                        class="{{ $isLight ? 'text-emerald-700' : 'text-emerald-400' }} font-bold text-sm">
                                        Rp {{ $product['price'] }}
                                        <span
                                            class="text-xs font-normal {{ $isLight ? 'text-gray-500' : 'text-emerald-100/60' }}">
                                            / hari
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- KONTROL SEWA (Hanya muncul jika sudah memilih tanggal sewa) -->
                            @if ($tanggalSewaAktif)
                                <div
                                    class="mt-4 pt-3 border-t {{ $isLight ? 'border-gray-100' : 'border-emerald-900/40' }} space-y-3">

                                    <!-- Form Aksi Sewa Murni PHP -->
                                    <form action="" method="POST" class="space-y-3">
                                        @csrf
                                        <!-- Bawa serta data tanggal sewa agar tidak hilang -->
                                        <input type="hidden" name="tanggal_sewa" value="{{ $tanggalSewaAktif }}">
                                        <input type="hidden" name="product_name" value="{{ $product['name'] }}">

                                        <!-- Input Jumlah / Kuantitas Manual via Angka (Tanpa JS) -->
                                        <div
                                            class="flex items-center justify-between text-xs font-medium {{ $isLight ? 'text-gray-700' : 'text-emerald-200' }}">
                                            <span>Jumlah unit:</span>
                                            <input type="number" name="qty" value="1" min="1"
                                                max="10"
                                                class="w-16 text-center bg-emerald-500/10 border {{ $isLight ? 'border-gray-300 text-gray-800' : 'border-emerald-600/40 text-white' }} py-1 rounded-xl text-xs font-bold focus:outline-none">
                                        </div>

                                        <!-- Tombol Aksi (Lihat Detail & Tombol Sewa) -->
                                        <div class="flex items-center gap-2">
                                            <a href="#"
                                                class="{{ $isLight ? 'text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border-emerald-200' : 'text-emerald-300 hover:text-white bg-emerald-950/80 hover:bg-emerald-900 border-emerald-800/60' }} flex-1 text-center text-xs font-medium py-2 rounded-xl border transition">
                                                Lihat Detail
                                            </a>

                                            <button type="submit"
                                                class="flex-1 bg-[#0f382b] hover:bg-[#164e3d] text-emerald-100 text-xs font-bold py-2 rounded-xl transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer">
                                                <i data-lucide="shopping-cart" class="w-3.5 h-3.5"></i>
                                                Sewa
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            @else
                                <!-- Jika BELUM memilih tanggal sewa, tombol Sewa disembunyikan -->
                                <div
                                    class="mt-4 pt-3 border-t {{ $isLight ? 'border-gray-100' : 'border-emerald-900/40' }}">
                                    <a href="#"
                                        class="{{ $isLight ? 'text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border-emerald-200' : 'text-emerald-300 hover:text-white bg-emerald-950/80 hover:bg-emerald-900 border-emerald-800/60' }} block text-center text-xs font-medium py-2 rounded-xl border transition">
                                        Lihat Detail
                                    </a>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>


            </section>




        </main>
    </div>

    <!-- Script Vanilla JavaScript (Dijamin Berfungsi) -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btn = document.getElementById("dropdown-btn");
            const dropdown = document.getElementById("calendar-dropdown");
            const chevron = document.getElementById("chevron-icon");
            const calendarGrid = document.getElementById("calendar-grid");
            const monthYearTitle = document.getElementById("month-year-title");
            const btnLanjut = document.getElementById("btn-lanjut");
            const inputTanggalSewa = document.getElementById("input-tanggal-sewa");
            const filterForm = document.getElementById("filter-form");

            if (!btn || !dropdown) return;

            const monthNames = [
                'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
                'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'
            ];

            // Ambil tanggal sewa yang sudah tersimpan di input PHP
            let savedDate = inputTanggalSewa.value.trim();

            let currentMonth = 10;
            let currentYear = 2026;
            let selectedStart = null;
            let selectedEnd = null;

            // Baca tanggal sebelumnya dari format:
            // 11 NOVEMBER 2026
            // 11 – 13 NOVEMBER 2026
            if (savedDate) {
                const match = savedDate.match(
                    /^(\d{1,2})(?:\s*[–-]\s*(\d{1,2}))?\s+([A-Z]+)\s+(\d{4})$/i
                );

                if (match) {
                    const startDay = parseInt(match[1], 10);
                    const endDay = match[2] ? parseInt(match[2], 10) : null;
                    const monthName = match[3].toUpperCase();
                    const year = parseInt(match[4], 10);

                    const monthIndex = monthNames.indexOf(monthName);

                    if (monthIndex !== -1) {
                        currentMonth = monthIndex;
                        currentYear = year;
                        selectedStart = startDay;
                        selectedEnd = endDay;
                    }
                }
            }

            // Toggle Dropdown
            btn.addEventListener("click", function(e) {
                e.stopPropagation();
                dropdown.classList.toggle("hidden");
                if (chevron) chevron.classList.toggle("rotate-180");
                renderCalendar();
            });

            // Mencegah klik di dalam dropdown menutup dirinya
            dropdown.addEventListener("click", function(e) {
                e.stopPropagation();
            });

            // Klik di luar -> Tutup dropdown
            document.addEventListener("click", function(e) {
                if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
                    dropdown.classList.add("hidden");
                    if (chevron) chevron.classList.remove("rotate-180");
                }
            });

            // Render Tanggal
            function renderCalendar() {
                monthYearTitle.innerText = `${monthNames[currentMonth]} ${currentYear}`;
                calendarGrid.innerHTML = "";

                let firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();
                let offset = firstDayIndex === 0 ? 6 : firstDayIndex - 1;
                let totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();

                for (let i = 0; i < offset; i++) {
                    calendarGrid.appendChild(document.createElement("div"));
                }

                for (let day = 1; day <= totalDays; day++) {
                    let dayBtn = document.createElement("button");
                    dayBtn.type = "button";
                    dayBtn.innerText = day;

                    let baseClass =
                        "w-8 h-8 mx-auto flex items-center justify-center rounded-full transition-all text-gray-800 hover:bg-emerald-100 cursor-pointer ";

                    if (day === selectedStart || day === selectedEnd) {
                        dayBtn.className = baseClass + "bg-[#3bf4b5] text-white font-semibold shadow-sm";
                    } else if (selectedStart && selectedEnd && day > selectedStart && day < selectedEnd) {
                        dayBtn.className = baseClass + "bg-[#d5f9e9] text-emerald-900 font-medium";
                    } else {
                        dayBtn.className = baseClass;
                    }

                    dayBtn.addEventListener("click", function(e) {
                        e.stopPropagation();

                        if (!selectedStart || (selectedStart && selectedEnd)) {
                            selectedStart = day;
                            selectedEnd = null;
                        } else if (day >= selectedStart) {
                            selectedEnd = day;
                        } else {
                            selectedStart = day;
                            selectedEnd = null;
                        }
                        renderCalendar();
                    });

                    calendarGrid.appendChild(dayBtn);
                }
            }

            // Navigasi Bulan
            document.getElementById("prev-month").addEventListener("click", function(e) {
                e.stopPropagation();
                if (currentMonth === 0) {
                    currentMonth = 11;
                    currentYear--;
                } else {
                    currentMonth--;
                }
                renderCalendar();
            });

            document.getElementById("next-month").addEventListener("click", function(e) {
                e.stopPropagation();
                if (currentMonth === 11) {
                    currentMonth = 0;
                    currentYear++;
                } else {
                    currentMonth++;
                }
                renderCalendar();
            });

            // Tombol LANJUT -> Submit Form tanpa kembali ke atas
            btnLanjut.addEventListener("click", function(e) {
                e.stopPropagation();

                if (selectedStart && selectedEnd) {
                    let mName = monthNames[currentMonth];
                    inputTanggalSewa.value = `${selectedStart} – ${selectedEnd} ${mName} ${currentYear}`;

                } else if (selectedStart) {
                    let mName = monthNames[currentMonth];
                    inputTanggalSewa.value = `${selectedStart} ${mName} ${currentYear}`;

                } else {
                    alert("Silakan pilih tanggal terlebih dahulu!");
                    return;
                }

                // Simpan posisi scroll sebelum halaman dimuat ulang
                sessionStorage.setItem(
                    "hikeMateScrollPosition",
                    window.scrollY
                );

                // Kirim form
                filterForm.submit();
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            const scrollKey = "hikeMateScrollPosition";

            // Kembalikan posisi scroll setelah halaman selesai dimuat
            const savedPosition = sessionStorage.getItem(scrollKey);

            if (savedPosition !== null) {
                requestAnimationFrame(() => {
                    window.scrollTo({
                        top: Number(savedPosition),
                        behavior: "instant"
                    });

                    sessionStorage.removeItem(scrollKey);
                });
            }

            // Simpan posisi ketika link menuju halaman yang sama diklik
            document.querySelectorAll("a[href]").forEach(function(link) {
                link.addEventListener("click", function(event) {
                    if (
                        event.ctrlKey ||
                        event.shiftKey ||
                        event.metaKey ||
                        event.button !== 0 ||
                        link.target === "_blank" ||
                        link.hasAttribute("download")
                    ) {
                        return;
                    }

                    const url = new URL(link.href, window.location.href);

                    if (
                        url.origin === window.location.origin &&
                        url.pathname === window.location.pathname &&
                        !url.hash
                    ) {
                        sessionStorage.setItem(
                            scrollKey,
                            window.scrollY
                        );
                    }
                });
            });

            // Simpan posisi ketika form Cari, Filter, atau Sewa dikirim
            document.querySelectorAll("form").forEach(function(form) {
                form.addEventListener("submit", function() {
                    sessionStorage.setItem(
                        scrollKey,
                        window.scrollY
                    );
                });
            });
        });
    </script>
@endsection
