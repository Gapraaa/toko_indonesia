<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua barang dan relasi supplier
        $query = Barang::with('supplier');

        // Jika ada pencarian berdasarkan nama_barang
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $barang = $query->get();

        return view('home', compact('barang'));
    }
}
