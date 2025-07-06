<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang | Toko Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('home') }}" class="mb-4">
            <input type="text" name="search" placeholder="Cari Nama Barang..." 
                class="border px-3 py-2 rounded-md w-1/2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Cari
            </button>
        </form>

        <!-- Tabel Barang -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID Barang</th>
                    <th class="border p-2">Kategori</th>
                    <th class="border p-2">Nama Barang</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Stok</th>
                    <th class="border p-2">Supplier</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->kategori }}</td>
                    <td class="border p-2">{{ $item->nama_barang }}</td>
                    <td class="border p-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="border p-2">{{ $item->stok }}</td>
                    <td class="border p-2">{{ $item->supplier->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
