<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 mb-10 p-6 bg-white rounded-lg shadow-md w-1/2">
        <h1 class="text-2xl font-bold mb-4 text-center">Selamat Datang</h1>
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nama Pengguna</label>
            <p class="mt-1 p-2 border rounded w-full">{{ $user->nama }}</p>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
            <p class="mt-1 p-2 border rounded w-full">{{ $user->alamat }}</p>
        </div>

        <div class="mb-4">
            <label for="nomer_handphone" class="block text-sm font-medium text-gray-600">Nomor Handphone</label>
            <p class="mt-1 p-2 border rounded w-full">{{ $user->nomer_handphone }}</p>
        </div>

        <a href="{{ url('/logout') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</a>
    </div>
@endsection
