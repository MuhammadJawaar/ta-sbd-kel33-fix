<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>
<form action="{{ route('products.index') }}" method="GET" class="mb-4">
    <div class="flex space-x-2">
        <input type="text" name="search" placeholder="Search" class="border p-2">
        <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
            Search
        </button>
    </div>
</form>
<div class="flex space-x-8 mb-4">
    <a href="{{ route('categories.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Tambah Kategori
    </a>
    <a href="{{ route('categories.trash') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Tempat Sampah
    </a>
</div>
<table class="min-w-full divide-y divide-gray-200">
    <!-- Tabel Header -->
    <thead>
        <tr>
            <th class="py-3 px-6 text-left">ID Kategori</th>
            <th class="py-3 px-6 text-left">Nama Kategori</th>
            <th class="py-3 px-6 text-left">Aksi</th> <!-- Kolom Aksi -->
        </tr>
    </thead>
    <!-- Tabel Body -->
    <tbody class="divide-y divide-gray-200">
        @foreach ($categories as $category)
        <tr>
            <td class="py-3 px-6">{{ $category->id_kategori }}</td>
            <td class="py-3 px-6">{{ $category->name }}</td>
            <td class="py-3 px-6">
                <a href="{{ route('categories.edit', $category->id_kategori) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                <!-- Delete Form -->
                <form action="{{ route('categories.destroy', $category->id_kategori) }}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
                <!-- Soft Delete Form -->
                <form action="{{ route('categories.softDelete', $category->id_kategori) }}" method="post" class="inline-block">
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
@endsection