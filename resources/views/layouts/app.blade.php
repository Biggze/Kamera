<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CameraHub')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        /* ...CSS header/navbar, dropdown, dsb... */
    </style>
    @stack('styles')
</head>
<body>
    {{-- Navbar/Header --}}
    @include('layouts.navigation')

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- JS dropdown, dsb --}}
    <script>
        // ...JS dropdown user, dsb...
    </script>
    @stack('scripts')
</body>
</html>