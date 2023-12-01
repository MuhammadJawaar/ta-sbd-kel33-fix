<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Alat Tulis</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Replace Bootstrap with Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen">
    <header>
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex items-center justify-between">
                <a class="text-white text-2xl font-bold" href="/products">Toko Alat Tulis</a>
                <button class="lg:hidden text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="hidden lg:flex space-x-4">
                    <a class="text-white" href="/home">Beranda</a>
                    <a class="text-white" href="/products">Produk</a>
                    <a class="text-white" href="/categories">Kategori</a>
                    <a class="text-white" href="/transaksi">transaksi</a>
                    <a class="text-white" href="/logout">logout</a>
                    <!-- Add more menu items if needed -->
                </div>
            </div>
        </nav>
    </header>

    <main class="container mx-auto mt-4 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-1">
        <div class="container mx-auto text-center">
            <!-- Add footer content here -->
            &copy; {{ date('Y') }} Toko Alat Tulis. All Rights Reserved.
        </div>
    </footer>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
