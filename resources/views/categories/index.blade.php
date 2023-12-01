<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Lihat Produk
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <!-- Tabel Header -->
        <thead>
            <tr>
                <th class="py-3 px-6 text-left">ID Kategori</th>
                <th class="py-3 px-6 text-left">Nama Kategori</th>
            </tr>
        </thead>
        <!-- Tabel Body -->
        <tbody class="divide-y divide-gray-200">
            @foreach ($categories as $category)
                <tr>
                    <td class="py-3 px-6">{{ $category->id_kategori }}</td>
                    <td class="py-3 px-6">{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
