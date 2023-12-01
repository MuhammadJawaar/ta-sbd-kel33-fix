@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 mb-10 p-6 bg-white rounded-lg shadow-md w-1/2">
        <h1 class="text-2xl font-bold mb-4 text-center">Tambah Kategori Baru</h1>
        
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama Kategori</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan Kategori</button>
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 font-bold py-2 px-4 rounded">Kembali</a>
            </div>
        </form>
    </div>
@endsection
