@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Kelola Supplier</h2>

    <!-- Form Tambah Supplier -->
    <form action="{{ route('supplier.store') }}" method="POST" class="mb-6">
        @csrf
        <!-- ID Supplier tidak perlu dimasukkan secara manual, karena akan digenerate otomatis -->
        <input type="text" name="nama" placeholder="Nama Supplier" required class="border p-2">
        <input type="text" name="alamat" placeholder="Alamat" required class="border p-2">
        <input type="text" name="kota" placeholder="Kota" required class="border p-2">
        <input type="text" name="telepon" placeholder="Telepon" required class="border p-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
    </form>

    <!-- Daftar Supplier -->
    <table class="w-full bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Alamat</th>
                <th class="p-2">Kota</th>
                <th class="p-2">Telepon</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $s)
            <tr>
                <td class="p-2">{{ $s->id }}</td>
                <td class="p-2">{{ $s->nama }}</td>
                <td class="p-2">{{ $s->alamat }}</td>
                <td class="p-2">{{ $s->kota }}</td>
                <td class="p-2">{{ $s->telepon }}</td>
                <td class="p-2">
                    <form action="{{ route('supplier.destroy', $s->id) }}" method="POST" class="inline">
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
