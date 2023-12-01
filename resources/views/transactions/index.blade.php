<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

<table class="min-w-full divide-y divide-gray-200">
    <!-- Tabel Header -->
    <thead>
        <tr>
            <th class="py-3 px-6 text-left">ID Transaksi</th>
            <th class="py-3 px-6 text-left">Tanggal</th>
            <th class="py-3 px-6 text-left">Produk</th>
            <th class="py-3 px-6 text-left">User</th>
            <th class="py-3 px-6 text-left">Jumlah</th>
            <th class="py-3 px-6 text-left">Total Harga</th>
        </tr>
    </thead>
    <!-- Tabel Body -->
    <tbody class="divide-y divide-gray-200">
        @foreach ($transactions as $$transactions)
        <tr>
            <td class="py-3 px-6">{{ $transactions->id_transaksi }}</td>
            <td class="py-3 px-6">{{ $transactions->tanggal }}</td>
            <td class="py-3 px-6">{{ $transactions->jumlah }}</td>
            <td class="py-3 px-6">{{ $transactions->total_harga ?? '-' }}</td>
            <td class="py-3 px-6">{{ $transactions->product_name ?? '-' }}</td>
            <td class="py-3 px-6">{{ $transactions->user_name ?? '-' }}</td>
            <td class="py-3 px-6 flex items-center space-x-2">
                <a href="{{ route('products.edit', $transactions->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

                <!-- Delete Form -->
                <form action="{{ route('products.destroy', $transactions->id) }}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
                <!-- Soft Delete Form -->
                <form action="{{ route('products.softDelete', $transactions->id) }}" method="post" class="inline-block">
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