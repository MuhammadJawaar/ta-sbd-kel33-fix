<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>
<div class="mb-4">
    <a href="{{ route('categories.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Lihat Kategori
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
                <form action="{{ route('categories.destroy', $category->id_kategori) }}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
                <!-- Restore Form -->
                <form action="{{ route('categories.restore', $category->id_kategori) }}" method="post" class="inline-block">
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
@endsection