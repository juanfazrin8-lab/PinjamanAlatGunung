<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HikeMate - Store & Directory</title>
    <!-- Tailwind CSS CDN -->
   @vite('resources/css/app.css')
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
@php
    $theme = session('theme', 'dark');
@endphp

<body class="{{ $theme === 'light'
    ? 'bg-white text-gray-900'
    : 'bg-[#121c18] text-white' }} min-h-screen flex flex-col">




    @include('layouts.header')

</div>

    <div>
        @yield('content')
    </div>

    @include('layouts.footer')

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>