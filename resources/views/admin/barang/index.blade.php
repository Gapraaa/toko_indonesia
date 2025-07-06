@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Kelola Barang</h2>

    <!-- Form Tambah Barang -->
    <form action="{{ route('barang.store') }}" method="POST" class="mb-6">
        @csrf
        <!-- Hapus input ID Barang karena ID di-generate otomatis -->
        <select name="kategori" required class="border p-2">
            <option value="">Pilih Kategori</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option> <!-- Kategori diperbaiki -->
        </select>
        <input type="text" name="nama_barang" placeholder="Nama Barang" required class="border p-2">
        <input type="number" name="harga" placeholder="Harga" required class="border p-2">
        <input type="number" name="stok" placeholder="Stok" required class="border p-2">
        <select name="supplier_id" required class="border p-2">
            <option value="">Pilih Supplier</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
    </form>

    <!-- Daftar Barang -->
    <table class="w-full bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Harga</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Supplier</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
            <tr>
                <td class="p-2">{{ $b->id }}</td>
                <td class="p-2">{{ $b->kategori }}</td>
                <td class="p-2">{{ $b->nama_barang }}</td>
                <td class="p-2">Rp{{ number_format($b->harga) }}</td>
                <td class="p-2">{{ $b->stok }}</td>
                <td class="p-2">{{ $b->supplier->nama }}</td>
                <td class="p-2">
                    <a href="{{ route('barang.edit', $b->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
