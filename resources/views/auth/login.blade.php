<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex items-center justify-center h-screen">
    
    <form action="{{ url('/login') }}" method="post" class="bg-white px-20 py-10 rounded shadow-md">
        @csrf
        <h1 class="text-2xl font-bold mb-4 text-center">Toko Alat Tulis</h1>
        <div class="mb-4">
            <label for="nomer_handphone" class="block text-gray-700">Nomor Handphone:</label>
            <input type="text" name="nomer_handphone" class="mt-1 p-2 w-full border rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password:</label>
            <input type="password" name="password" class="mt-1 p-2 w-full border rounded" required>
        </div>

        <div class="fmb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
        </div>
    </form>
</div>

</body>
</html>
