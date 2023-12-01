@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 mb-10 p-6 bg-white rounded-lg shadow-md w-1/2">
    <h1 class="text-2xl font-bold mb-4 text-center">Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nama Produk</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-600">Harga</label>
            <input type="number" name="price" id="price" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="mt-1 p-2 border rounded w-full"></textarea>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-600">Stok</label>
            <input type="number" name="stock" id="stock" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-600">Kategori</label>
            <select name="category" id="category" class="mt-1 p-2 border rounded w-full" required>
                @foreach ($categories as $category)
                @if ($category->isDeleted == 0)
                <option value="{{ $category->id_kategori }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan Produk</button>
            <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 font-bold py-2 px-4 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection