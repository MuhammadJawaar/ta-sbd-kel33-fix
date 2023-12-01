<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
<!-- Search Form -->
<form action="{{ route('products.index') }}" method="GET" class="mb-4">
    <div class="flex space-x-2">
        <input type="text" name="search" placeholder="Search" class="border p-2">
        <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
            Search
        </button>
    </div>
</form>

<div class="flex space-x-8 mb-4">
    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Tambah Produk
    </a>
    <a href="{{ route('products.trash') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Tempat Sampah
    </a>
</div>
<table class="min-w-full divide-y divide-gray-200">
    <!-- Tabel Header -->
    <thead>
        <tr>
            <th class="py-3 px-6 text-left">ID Produk</th>
            <th class="py-3 px-6 text-left">Nama</th>
            <th class="py-3 px-6 text-left">Harga</th>
            <th class="py-3 px-6 text-left">Deskripsi</th>
            <th class="py-3 px-6 text-left">Stok</th>
            <th class="py-3 px-6 text-left">Kategori</th>
            <th class="py-3 px-6 text-left">Aksi</th> <!-- Kolom Aksi -->
        </tr>
    </thead>
    <!-- Tabel Body -->
    <tbody class="divide-y divide-gray-200">
        @foreach ($products as $product)
        <tr>
            <td class="py-3 px-6">{{ $product->id }}</td>
            <td class="py-3 px-6">{{ $product->name }}</td>
            <td class="py-3 px-6">{{ $product->price }}</td>
            <td class="py-3 px-6">{{ $product->description ?? '-' }}</td>
            <td class="py-3 px-6">{{ $product->stock ?? '-' }}</td>
            <td class="py-3 px-6">{{ $product->category ?? '-' }}</td>
            <td class="py-3 px-6 flex items-center space-x-2">
                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

                <!-- Delete Form -->
                <form action="{{ route('products.destroy', $product->id) }}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
                <!-- Soft Delete Form -->
                <form action="{{ route('products.softDelete', $product->id) }}" method="post" class="inline-block">
                    @csrf
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="text-red-500 hover:text-red-700">
                        SoftDelete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Konfirmasi Penghapusan menggunakan JavaScript -->
@endsection