@extends('layouts.admin') <!-- Menyertakan layout yang telah Anda buat -->

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Daftar Barang dan Supplier</h2>

    <div class="grid grid-cols-2 gap-6">
        <!-- Daftar Barang -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Barang</h3>
            <table class="min-w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-2 px-4 text-left">Kode Barang</th>
                        <th class="border-b py-2 px-4 text-left">Nama Barang</th>
                        <th class="border-b py-2 px-4 text-left">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk menampilkan daftar barang -->
                    @foreach ($barangs as $barang)
                        <tr>
                            <td class="border-b py-2 px-4">{{ $barang->id }}</td>
                            <td class="border-b py-2 px-4">{{ $barang->nama_barang }}</td>
                            <td class="border-b py-2 px-4">{{ number_format($barang->harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Daftar Supplier -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Supplier</h3>
            <table class="min-w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-2 px-4 text-left">Nama Supplier</th>
                        <th class="border-b py-2 px-4 text-left">Kontak</th>
                        <th class="border-b py-2 px-4 text-left">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk menampilkan daftar supplier -->
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td class="border-b py-2 px-4">{{ $supplier->nama }}</td>
                            <td class="border-b py-2 px-4">{{ $supplier->telepon }}</td>
                            <td class="border-b py-2 px-4">{{ $supplier->alamat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
