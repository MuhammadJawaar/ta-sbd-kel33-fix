<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
<div class="flex space-x-8 mb-4">
    <a href="{{ route('products.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Lihat Produk
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
            <td class="py-3 px-6">
                <form action="{{ route('products.destroy', $product->id) }}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
                <!-- Restore Form -->
                <form action="{{ route('products.restore', $product->id) }}" method="post" class="inline-block">
                    @csrf
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin memulihkan kategori ini?')" class="text-green-500 hover:text-green-700">
                        Restore
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Konfirmasi Penghapusan menggunakan JavaScript -->
@endsection