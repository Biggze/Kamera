<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CameraHub')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
                       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }
       
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