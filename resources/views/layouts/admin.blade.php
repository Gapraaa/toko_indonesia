<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-blue-900 min-h-screen text-white p-5">
        <h1 class="text-xl font-bold mb-6">Admin Panel</h1>
        <ul>
            <li class="mb-4">
                <a href="{{ route('barang.index') }}" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-600">Barang</a>
            </li>
            <li>
                <a href="{{ route('supplier.index') }}" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-600">Supplier</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>

</body>
</html>
